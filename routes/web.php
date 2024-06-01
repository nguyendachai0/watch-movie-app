<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCountryController;
use App\Http\Controllers\Admin\AdminGenreController;
use App\Http\Controllers\Admin\AdminMovieController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UpdateMovieAPIController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\Client\IndexController;
use App\Http\Controllers\Client\MovieController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Support\Facades\Auth;

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('google-callback');
Route::get('/', [IndexController::class, 'index'])->name('homepage');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');
Route::get('/info/{slug}', [IndexController::class, 'info'])->name('info');
Route::get('/xem/{slug}', [IndexController::class, 'watch'])->where('slug', '.*')->name('watch');
Route::get('/loc-phim', [IndexController::class, 'filterMovie'])->name('filterMovie');
Route::get('/search/suggestions', [MovieController::class, 'suggestions']);
Route::get('/api', [APIController::class, 'api']);
Auth::routes([
    'verify' => true
]);
Route::get('/admin', [HomeController::class, 'index'])->name('admin')->middleware('auth', 'verified', 'role:admin');
Route::resource('admin/category', AdminCategoryController::class)->middleware('auth', 'verified', 'role:admin');
Route::resource('admin/country', AdminCountryController::class)->middleware('auth', 'verified', 'role:admin');
Route::resource('admin/genre', AdminGenreController::class)->middleware('auth', 'verified', 'role:admin');
Route::resource('admin/movie', AdminMovieController::class)->middleware('auth', 'verified', 'role:admin');
Route::get('/update-movies', [UpdateMovieAPIController::class, 'updateMovies'])->name('update.movies');
Route::get('/test', function (Request  $request) {
    $content   =  "\u003Cp\u003EHành trình fangirl Im Sol quay ngược về quá khứ để thay đổi số mệnh bi thảm ở hiện tại của nam thần tượng mà cô yêu thích Ryu Sun Jae.\u003C/p\u003E\u003Cp\u003E&nbsp;\u003C/p\u003E";
    $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
        return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
    }, $content);
    return $str;
});

// Route::get('/admin', [HomeController::class, 'index'])->name('home');
