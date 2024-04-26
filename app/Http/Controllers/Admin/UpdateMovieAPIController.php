<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\UpdateMoviesJob;
use App\Models\Cast;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UpdateMovieAPIController extends Controller
{
    public function updateMovies()
    {
        UpdateMoviesJob::dispatch();
    }
}
