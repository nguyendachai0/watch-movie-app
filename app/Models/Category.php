<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
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
    protected function name(): CastsAttribute
    {
        return CastsAttribute::make(
            get: fn (string $value) => $this->changeDefaultName($value)
        );
    }
    protected function changeDefaultName($value): String
    {
        if ($value == 'hoathinh') {
            $value = 'Hoạt Hình';
        } elseif ($value == 'single') {
            $value = 'Phim Lẻ';
        } elseif ($value == 'series') {
            $value = 'Phim Bộ';
        } elseif ($value == 'tvshows') {
            $value = 'TV Show';
        }
        return $value;
    }
}
