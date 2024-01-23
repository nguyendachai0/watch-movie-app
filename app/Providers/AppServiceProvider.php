<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $categories = Category::orderBy('id', 'desc')->where('status', 1)->get();
            $genres = Genre::orderBy('id', 'desc')->get();
            $countries = Country::orderBy('id', 'desc')->get();

            $view->with('categories', $categories)
                ->with('genres', $genres)
                ->with('countries', $countries);
        });
    }
}
