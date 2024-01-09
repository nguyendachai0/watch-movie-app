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
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->get();
        $country = Country::orderBy('id', 'desc')->get();
        $category_home = Category::with('movie')->orderBy('id', 'desc')->where('status', 1)->get();


        return view('pages.home', compact('category', 'genre', 'country', 'category_home'));
    }
    public function category($slug)
    {
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->get();
        $country = Country::orderBy('id', 'desc')->get();
        $cate_slug = Category::where('slug', $slug)->first();
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug'));
    }
    public function genre($slug)
    {
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->get();
        $country = Country::orderBy('id', 'desc')->get();
        $genre_slug = Genre::where('slug', $slug)->first();
        return view('pages.genre', compact('category', 'genre', 'country', 'genre_slug'));
    }
    public function country($slug)
    {
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->get();
        $country = Country::orderBy('id', 'desc')->get();
        $country_slug = Country::where('slug', $slug)->first();
        return view('pages.country', compact('category', 'genre', 'country', 'country_slug'));
    }
    public function movie($slug)
    {
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->get();
        $country = Country::orderBy('id', 'desc')->get();
        $movie = Movie::where('slug', $slug)->first();
        return view('pages.movie', compact('category', 'genre', 'country', 'movie'));
    }
    public function watch()
    {
        return view('pages.watch');
    }
    public function episode()
    {
        return view('pages.episode');
    }
}
