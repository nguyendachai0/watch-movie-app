<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function suggestions(Request $request)
    {
        $query = $request->input('query');
        $movies = Movie::where('title', 'like', '%' . $query . '%')->limit(5)->get();
        return $movies;
        return response()->json($movies);
    }
}
