<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function changeLinkStreamForEachEpisode($episodeString)
    {
        $episodeArray = explode(' ', $episodeString);
        $episodesAssocArray = [];
        foreach ($episodeArray as $episode) {
            $parts = explode('|', $episode);
            $episodeNumber = $parts[0];
            $link = $parts[1];
            $episodesAssocArray[$episodeNumber] = $link;
        }
        return $episodesAssocArray;
    }
}
