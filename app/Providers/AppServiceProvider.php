<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use Illuminate\Pagination\Paginator;
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
            $chunkedGenres  = array_chunk($genres->toArray(), 3);
            $view->with('categories', $categories)
                ->with('genres', $genres)
                ->with('countries', $countries)
                ->with('chunkedGenres', $chunkedGenres);
        });
        view()->composer('client.layouts.partials.header', function ($view) {
            $headerCategories = Category::all();
            $headerGenres = Genre::all()->chunk(7);
            $headerNation = Country::all()->chunk(6);

            $view->with([
                'headerCategories' => $headerCategories,
                'headerGenres' => $headerGenres,
                'headerNation' => $headerNation,
            ]);
        });
        Paginator::defaultView('vendor.pagination.semantic-ui');
    }
}
