<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title', 'description', 'image', 'category_id', 'genre_id', 'country_id', 'active', 'status', 'poster', 'link_trailer', 'link_stream', 'actor', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
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
