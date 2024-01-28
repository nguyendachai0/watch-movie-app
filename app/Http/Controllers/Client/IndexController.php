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
        $category_home = Category::with('movie')->orderBy('id', 'desc')->where('status', 1)->get();
        $popularMovies = Movie::orderBy('id', 'desc')->where('status', 2)->get();
        $banner_movie = Movie::where('status', 3)->get()->first();
        return view('client.pages.home', compact('category_home', 'popularMovies', 'banner_movie'));
    }
    public function category($slug)
    {
        $cate_slug = Category::where('slug', $slug)->first();
        $movieWithSlug = Movie::where('category_id', $cate_slug->id)->get();
        return view('client.pages.category', compact('cate_slug', 'movieWithSlug'));
    }
    public function genre($slug)
    {
        $genre_slug = Genre::where('slug', $slug)->first();
        if ($genre_slug) {
            $movieWithSlug = Movie::where('genre_id', $genre_slug->id)->get();
            return view('client.pages.genre', compact('genre_slug', 'movieWithSlug'));
        } else {
            return redirect('/');
        }
    }
    public function country($slug)
    {

        $country_slug = Country::where('slug', $slug)->first();
        if ($country_slug) {
            $movieWithSlug = Movie::where('country_id', $country_slug->id)->get();
            return view('client.pages.country', compact('country_slug', 'movieWithSlug'));
        }
    }
    public function watch($slug)
    {
        $parts = explode('/', $slug);
        $movie = Movie::where('slug', $parts[0])->first();
        if ($movie->category && $movie->category->title == 'Phim bộ') {
            $movie->link_stream = $movie->changeLinkStreamForEachEpisode($movie->link_stream);
            $sumEpisode = count($movie->link_stream);
            $episode = isset($parts[1]) ? $parts[1] : 1;
            $movie->link_stream = $movie->link_stream[$episode];
            $sumEpisode = isset($sumEpisode) ? $sumEpisode : 0;
            $episode = isset($episode) ? $episode : 1;
            $castListName = explode(', ', $movie->actor);
            $castList = Cast::whereIn('name', $castListName)->get();
            return view('client.pages.watch', compact('movie', 'castList', 'sumEpisode', 'episode'));
        }
        $castListName = explode(', ', $movie->actor);
        $castList = Cast::whereIn('name', $castListName)->get();
        return view('client.pages.watch', compact('movie', 'castList'));
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
        $movieFilterList = $query->get();
        return view('client.pages.filter', compact('movieFilterList'));
    }
}
