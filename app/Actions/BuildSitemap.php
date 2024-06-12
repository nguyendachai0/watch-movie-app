<?php

namespace App\Actions;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Carbon\Carbon;
use DateTime;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class BuildSitemap
{
    public function build(): void
    {
        $movies = Movie::all();
        $categories = Category::all();
        $countries = Country::all();
        $genres =  Genre::all();
        $sitemap = Sitemap::create();
        // $lastModificationDate = Carbon::now();
        // $lastModificationDateTime = new DateTime($lastModificationDate);
        // foreach ($movies as $movie) {
        //     $watchUrl =  Url::create(route('watch', ['slug' => $movie->slug]))
        //         // ->setLastModificationDate($now)
        //         ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
        //         ->setPriority(0.9);
        //     $infoUrl = Url::create(route('info', ['slug' => $movie->slug]))
        //         ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
        //         ->setPriority(0.3);
        //     $sitemap->add($watchUrl);
        //     $sitemap->add($infoUrl);
        // }
        // foreach ($categories as $category) {
        //     $categoryUrl = Url::create(route('category', ['slug' => $category->slug]))
        //         ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
        //         ->setPriority(0.3);
        //     $sitemap->add($categoryUrl);
        // }
        // foreach ($genres as $genre) {
        //     $genreUrl = Url::create(route('genre', ['slug' => $genre->slug]))
        //         ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
        //         ->setPriority(0.3);
        //     $sitemap->add($genreUrl);
        // }
        foreach ($countries as $country) {
            $countryUrl = Url::create(route('country', ['slug' => $country->slug]))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.3);
            $sitemap->add($countryUrl);
        }




        $sitemap->writeToFile(public_path('sitemap2.xml'));
    }
}
