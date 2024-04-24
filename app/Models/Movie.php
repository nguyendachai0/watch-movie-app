<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title', 'description', 'image', 'category_id', 'active', 'status', 'poster', 'link_trailer', 'link_stream', 'slug', 'origin_title', 'o_phim_id', 'link_m3u8', 'link_server_2',
        'link_server_3', 'link_server_4', 'link_server_5'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }
    public function countries()
    {
        return $this->belongsToMany(Country::class, 'movie_country');
    }
    public function casts()
    {
        return $this->belongsToMany(Cast::class, 'movie_cast');
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
