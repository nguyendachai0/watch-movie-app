<?php

namespace App\Jobs;

use App\Models\Cast;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
        $totalPages = 1086; // Total number of pages

        for ($page = 407; $page <= $totalPages; $page++) {
            try {
                $response = Http::get('https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=' . $page);
                $movies = $response->json()["items"];
                $movieDetails = $this->fetchMovieDetails($movies);
                foreach ($movieDetails as $movie) {
                    if (isset($movie['movie']['_id'])) {
                        if (!Movie::where('o_phim_id', $movie['movie']['_id'])->exists()) {
                            $this->processMovie($movie);
                        }
                    } else {
                        $this->processMovie($movie);
                    }
                }
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }
    }

    private function fetchMovieDetails($movies)
    {
        $movieDetails = [];
        foreach ($movies as $movie) {
            $slug = $movie['slug'];
            try {
                $response = Http::timeout(30)->get('https://ophim1.com/phim/' . $slug)->json();
                $movieDetails[] = $response;
            } catch (\Exception $e) {

                Log::error("Error fetching movie details for slug {$slug}: {$e->getMessage()}");
            }
        }
        return $movieDetails;
    }
    private function processMovie($movieData)
    {
        try {
            $thumbPath = $this->downloadImage($movieData['movie']['thumb_url']);
            $posterPath = $this->downloadImage($movieData['movie']['poster_url']);
            $movieData['movie']['thumb_url'] = $thumbPath;
            $movieData['movie']['poster_url'] = $posterPath;
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
        $category_id = Category::firstOrCreate(['name' => $movieData['type'], 'status' => 1])->id;
        $cleanedContent = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, $movieData['content']);
        return Movie::create([

            'name' => $movieData['name'],
            'o_phim_id' => $movieData['_id'],
            'origin_name' => $movieData['origin_name'],
            'content' => $cleanedContent,
            'slug' => $movieData['slug'],
            'status' =>  1,
            'thumb' => $movieData['thumb_url'],
            'poster' => $movieData['poster_url'],
            'category_id' => $category_id,
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
            $genre = Genre::firstOrCreate(['name' => $genreData['name'], 'slug' => $genreData['slug']]);
            $genreIds[] = $genre->id;
        }
        $movie->genres()->attach($genreIds);
    }

    private function processCountries($countries, $movie)
    {
        $countryIds = [];
        foreach ($countries as $countryData) {
            $country = Country::firstOrCreate(['name' => $countryData['name'], 'slug' => $countryData['slug']]);
            $countryIds[] = $country->id;
        }
        $movie->countries()->attach($countryIds);
    }

    private function processLinks($movieDetails, $movie)
    {
        $linkStream = '';
        $linkM3u8 = '';


        if (count($movieDetails['episodes'][0]['server_data']) > 1  && $movieDetails['movie']['status'] != 'trailer') {
            foreach ($movieDetails['episodes'][0]['server_data'] as $episode) {
                $linkStream .= $episode['name'] . '|' . $episode['link_embed'] . ' ';
                $linkM3u8 .= $episode['name'] . '|' . $episode['link_m3u8'] . ' ';
            }
        } elseif (count($movieDetails['episodes'][0]['server_data']) == 1 && $movieDetails['movie']['status'] != 'trailer') {
            $linkStream = $movieDetails['episodes'][0]['server_data'][0]['link_embed'];
            $linkM3u8 = $movieDetails['episodes'][0]['server_data'][0]['link_m3u8'];
        }

        $linkStream = rtrim($linkStream);
        $linkM3u8 = rtrim($linkM3u8);

        $movie->update(['link_stream' => $linkStream, 'link_m3u8' => $linkM3u8]);
    }
    private function downloadImage($url)
    {

        try {
            // Get the image content from the URL
            $client = new \GuzzleHttp\Client();
            $response = $client->get($url, [
                'headers' => ['User-Agent' => env('APP_NAME', 'Laravel')],
                'timeout' => 10,
            ]);
            $imageContent = $response->getBody()->getContents();
            $filenameWithoutExt = pathinfo($url, PATHINFO_FILENAME);
            $path = 'images/' . uniqid() . '_' . $filenameWithoutExt . '.webp';
            Storage::disk('public')->put($path, $imageContent);
            return $path;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            if ($e->hasResponse()) {
                $statusCode = $e->getResponse()->getStatusCode();
                Log::error("Error downloading image from {$url}: Status code: {$statusCode}");
                return null;
            } else {
                Log::error("Error downloading image from {$url}: {$e->getMessage()}");
                return  null;
            }
        }
    }
}
