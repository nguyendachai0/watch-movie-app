<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\UpdateMoviesJob;


class UpdateMovieAPIController extends Controller
{
    public function updateMovies()
    {
        UpdateMoviesJob::dispatch();
    }
}
