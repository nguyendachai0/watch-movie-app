<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quantityCategory = Category::count();
        $quantityCountry = Country::count();
        $quantityGenre = Genre::count();
        $quantityMovie = Movie::count();
        return view('admin.dashboard', compact('quantityCountry', 'quantityGenre', 'quantityMovie', 'quantityCategory'));
    }
}
