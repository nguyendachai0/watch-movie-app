<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'status',   'created_at', 'updated_at'];
    use HasFactory;
    public function movie()
    {
        return $this->hasMany(Movie::class, 'category_id');
    }
}
