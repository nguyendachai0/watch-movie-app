<?php

namespace App\Jobs;

use App\Models\Cast;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UpdateMoviesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $perPage = 50;
        $totalPages = 1077; // Total number of pages

        for ($page = 11; $page <= $totalPages; $page++) {
            $response = Http::get('https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=' . $page);
            $movies = $response->json()["items"];

            foreach (array_chunk($movies, $perPage) as $batch) {
                $movieDetails = $this->fetchMovieDetails($batch);
                foreach ($movieDetails as $movie) {

                    if (!Movie::where('o_phim_id', $movie['movie']['_id'])->exists()) {
                        $this->processMovie($movie);
                    }
                }
            }
        }
    }
    private function fetchMovieDetails($movies)
    {
        $movieDetails = [];

        foreach ($movies as $movie) {
            $slug = $movie['slug'];
            $retryAttempts = 3;
            for ($attempt = 1; $attempt <= $retryAttempts; $attempt++) {
                try {
                    $response = Http::timeout(30)->get('https://ophim1.com/phim/' . $slug)->json();
                    break; // Exit the loop if the request is successful
                } catch (\Exception $e) {
                    // Log or handle the exception
                    if ($attempt < $retryAttempts) {
                        sleep(5); // Wait before retrying
                    } else {
                        throw $e; // Rethrow the exception if all retry attempts fail
                    }
                }
            }
            $movieDetails[] = $response;
        }


        return $movieDetails;
    }
    private function processMovie($movieData)
    {
        try {

            $newMovie = $this->createOrUpdateMovie($movieData['movie']);
            $this->processActors($movieData['movie']['actor'], $newMovie);
            $this->processGenres($movieData['movie']['category'], $newMovie);
            $this->processCountries($movieData['movie']['country'], $newMovie);
            $this->processLinks($movieData, $newMovie);
        } catch (\Exception $e) {
            // Log error and continue processing other movies
            Log::error("Error processing movie: {$e->getMessage()}");
        }
    }

    private function createOrUpdateMovie($movieData)
    {
        return Movie::create([
            'title' => $movieData['name'],
            'o_phim_id' => $movieData['_id'],
            'origin_title' => $movieData['origin_name'],
            'description' => $movieData['content'],
            'slug' => $movieData['slug'],
            'image' => $movieData['thumb_url'],
            'poster' => $movieData['poster_url'],
            'category_id' => ($movieData['type'] == 'single') ? 6 : 3,
            'link_trailer' => $movieData['trailer_url'],
        ]);
    }

    private function processActors($actors, $movie)
    {
        $actorIds = [];
        foreach ($actors as $actorName) {
            $actor = Cast::firstOrCreate(['name' => $actorName]);
            $actorIds[] = $actor->id;
        }
        $movie->casts()->attach($actorIds);
    }

    private function processGenres($genres, $movie)
    {
        $genreIds = [];
        foreach ($genres as $genreData) {
            $genre = Genre::firstOrCreate(['title' => $genreData['name'], 'slug' => $genreData['slug']]);
            $genreIds[] = $genre->id;
        }
        $movie->genres()->attach($genreIds);
    }

    private function processCountries($countries, $movie)
    {
        $countryIds = [];
        foreach ($countries as $countryData) {
            $country = Country::firstOrCreate(['title' => $countryData['name'], 'slug' => $countryData['slug']]);
            $countryIds[] = $country->id;
        }
        $movie->countries()->attach($countryIds);
    }

    private function processLinks($movieDetails, $movie)
    {
        $linkStream = '';
        $linkM3u8 = '';

        if (count($movieDetails['movie']['episodes'][0]['server_data']) > 1  && $movieDetails['movie']['status'] != 'trailer') {
            foreach ($movieDetails['episodes'][0]['server_data'] as $episode) {
                $linkStream .= $episode['name'] . '|' . $episode['link_embed'] . ' ';
                $linkM3u8 .= $episode['name'] . '|' . $episode['link_m3u8'] . ' ';
            }
        } elseif (count($movieDetails['movie']['episodes'][0]['server_data']) == 1 && $movieDetails['movie']['status'] != 'trailer') {
            $linkStream = $movieDetails['episodes'][0]['server_data'][0]['link_embed'];
            $linkM3u8 = $movieDetails['episodes'][0]['server_data'][0]['link_m3u8'];
        }

        $linkStream = rtrim($linkStream);
        $linkM3u8 = rtrim($linkM3u8);

        $movie->update(['link_stream' => $linkStream, 'link_m3u8' => $linkM3u8]);
    }
}
