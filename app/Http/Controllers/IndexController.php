<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {

        $category_home = Category::with('movie')->orderBy('id', 'desc')->where('status', 1)->get();
        return view('pages.home', compact('category_home'));
    }
    public function category($slug)
    {

        $cate_slug = Category::where('slug', $slug)->first();
        return view('pages.category', compact('cate_slug'));
    }
    public function genre($slug)
    {

        $genre_slug = Genre::where('slug', $slug)->first();

        return view('pages.genre', compact('genre_slug'));
    }
    public function country($slug)
    {

        $country_slug = Country::where('slug', $slug)->first();
        return view('pages.country', compact('country_slug'));
    }
    public function movie($slug)
    {

        $movie = Movie::where('slug', $slug)->first();
        return view('pages.movie', compact('movie'));
    }
    public function watch($slug)
    {
        $movie = Movie::where('slug', $slug)->first();
        return view('pages.watch', compact('movie'));
    }
    public function episode()
    {
        return view('pages.episode');
    }
}