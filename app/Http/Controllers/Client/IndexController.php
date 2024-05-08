<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Cast;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $category_home = Category::with(['movies' => function ($query) {
            $query->orderByDesc('id')->take(20);
        }])
            ->where('status', 1)
            ->orderByDesc('id')
            ->get();
        return view('client.pages.home', compact('category_home'));
    }
    public function category($slug)
    {
        $cate_slug = Category::where('slug', $slug)->first();
        $movieWithSlug = Movie::where('category_id', $cate_slug->id)->paginate(20);
        $title = $cate_slug->name;
        return view('client.pages.movie-list', compact('title', 'movieWithSlug'));
    }
    public function genre($slug)
    {
        $genre_slug = Genre::where('slug', $slug)->first();
        $movieWithSlug = $genre_slug->movies()->paginate(20);
        $title = $genre_slug->name;
        return view('client.pages.movie-list', compact('title', 'movieWithSlug'));
    }
    public function country($slug)
    {

        $country_slug = Country::where('slug', $slug)->first();
        $movieWithSlug = $country_slug->movies()->paginate(20);
        $title = $country_slug->name;
        return view('client.pages.movie-list', compact('title', 'movieWithSlug'));
    }
    public function info($slug)
    {
        $movie = Movie::where('slug', $slug)->first();
        return view('client.pages.info', compact('movie'));
    }
    public function watch($slug)
    {
        $parts = explode('/', $slug);

        $movie = Movie::where('slug', $parts[0])->first();
        if (str_contains($movie->link_stream, '|')) {
            $movie->link_stream = $movie->changeLinkStreamForEachEpisode($movie->link_stream);
            $movie->link_m3u8 = $movie->changeLinkStreamForEachEpisode($movie->link_m3u8);
            $sumEpisode = count($movie->link_stream);
            $episode = isset($parts[1]) ? $parts[1] : 1;
            $movie->link_stream = $movie->link_stream[$episode];
            $movie->link_m3u8 = $movie->link_m3u8[$episode];
            $sumEpisode = isset($sumEpisode) ? $sumEpisode : 0;
            $episode = isset($episode) ? $episode : 1;
            return view('client.pages.watch', compact('movie', 'episode', 'sumEpisode'));
        }
        return view('client.pages.watch', compact('movie'));
    }
    public function watchTrailer($slug)
    {
        $movie = Movie::where('slug', $slug)->first();
        $castListName = explode(', ', $movie->actor);
        $castList = Cast::whereIn('name', $castListName)->get();
        return view('client.pages.watch-trailer', compact('movie', 'castList'));
    }
    public function filterMovie(Request $request)
    {
        $countryId = $request->input('country_id');
        $genreId = $request->input('genre_id');
        $categoryId = $request->input('category_id');
        $query = Movie::query();
        if ($countryId) {
            $query->where('country_id', $countryId);
        }

        if ($genreId) {
            $query->where('genre_id', $genreId);
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
        $movieFilterList = $query->paginate(20);
        return view('client.pages.filter', compact('movieFilterList'));
    }
}
