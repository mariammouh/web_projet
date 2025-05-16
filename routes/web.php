<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;     

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WatchlistController;

Route::get('/browse/{type}', ['App\Http\Controllers\BrowseController'::class, 'index'])->name('browse');
// Main Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Film Routes
Route::get('/films', ['App\Http\Controllers\FilmController'::class, 'index'])->name('films.index');
Route::get('/films/{film}', ['App\Http\Controllers\FilmController'::class, 'show'])->name('films.show');

// Show Routes
Route::get('/shows', ['App\Http\Controllers\ShowController'::class, 'index'])->name('shows.index');
Route::get('/shows/{show}', ['App\Http\Controllers\ShowController'::class, 'show'])->name('shows.show');

// Watchlist Routes
Route::get('/watchlist', ['App\Http\Controllers\WatchlistController'::class, 'index'])->name('watchlist');
Route::post('/watchlist', ['App\Http\Controllers\WatchlistController'::class, 'store'])->name('watchlist.store');
Route::delete('/watchlist/{watchlist}', ['App\Http\Controllers\WatchlistController', 'destroy'])->name('watchlist.destroy');

// Video Player Route
Route::get('/watch/{watch}', function ($id) {
    // Your existing display logic
})->name('watch');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
Route::get('/profile', function () {
    return view('profile');
})->name('profile');
*/



/*Route::get('/profile/{id}', 'App\Http\Controllers\ProfileController@show')->name('profile')->middleware('auth');*/
Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile/{id}', [ProfileController::class, 'store'])->name('profile_save');
});

Auth::routes();