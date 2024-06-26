<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['name', 'image'];
    public function movies()
    {
        return $this->belongsToMany(Movie::class,  'movie_cast');
    }
}
