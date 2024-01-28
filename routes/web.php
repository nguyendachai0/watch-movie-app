<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCountryController;
use App\Http\Controllers\Admin\AdminGenreController;
use App\Http\Controllers\Admin\AdminMovieController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Client\IndexController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('google-callback');
Route::get('/', [IndexController::class, 'index'])->name('homepage');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');
Route::get('/xem-phim/{slug}', [IndexController::class, 'watch'])->where('slug', '.*')->name('watch');
Route::get('/xem-trailer/{slug}', [IndexController::class, 'watchTrailer'])->name('watchTrailer');
Route::get('/loc-phim', [IndexController::class, 'filterMovie'])->name('filterMovie');
Auth::routes([
    'verify' => true
]);
Route::get('/admin', [HomeController::class, 'index'])->name('admin')->middleware('auth', 'verified', 'role:admin');
Route::resource('admin/category', AdminCategoryController::class)->middleware('auth', 'verified', 'role:admin');
Route::resource('admin/country', AdminCountryController::class)->middleware('auth', 'verified', 'role:admin');
Route::resource('admin/genre', AdminGenreController::class)->middleware('auth', 'verified', 'role:admin');
Route::resource('admin/movie', AdminMovieController::class)->middleware('auth', 'verified', 'role:admin');
// Route::get('/admin', [HomeController::class, 'index'])->name('home');
Route::resource('episode', EpisodeController::class);
