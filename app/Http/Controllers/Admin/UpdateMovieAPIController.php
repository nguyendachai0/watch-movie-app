<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class UpdateMovieAPIController extends Controller
{
    public function updateMovies()
    {
        $response = Http::get('https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=1');
        $movies = $response->json()["items"];
        foreach ($movies as $movie) {
            if (!Movie::where('id', $movie['_id'])->exists()) {
                $slug = $movie['slug'];
                $movie = Http::timeout(30)->get('https://ophim1.com/phim/' . $slug)->json();

                if (isset($movie['episodes'])) {
                    $link_stream = '';
                    foreach ($movie['episodes'][0]['server_data'] as $episode) {
                        $link_stream .= $episode['name'] . '|' . $episode['link_embed'] . ' ';
                    }
                }
                $link_stream = rtrim($link_stream);
                $country_id = (Country::where('title', $movie['movie']['country'])->first()->id) ?? 0;
                $newMovie =  Movie::create([
                    'title' => $movie['movie']['name'],
                    'description' => $movie['movie']['content'],
                    'slug' => $movie['movie']['slug'],
                    'image' => $movie['movie']['thumb_url'],
                    'poster' => $movie['movie']['poster_url'],
                    'category_id' => ($movie['movie']['type'] == 'single') ? 6 : 3,
                    'country_id' => $country_id,
                    'link_stream' => $link_stream,
                    'link_trailer' => $movie['movie']['trailer_url'],
                ]);
                $genre_ids = [];
                foreach ($movie['movie']['category'] as $genre) {
                    $genre = Genre::firstOrCreate(['title' => $genre['name'], 'slug' => $genre['slug']]);
                    $genre_ids[] = $genre->id;
                }

                $newMovie->genres()->attach($genre_ids);
            }
        }
    }
}
