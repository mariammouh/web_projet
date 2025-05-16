<?php

use App\Http\Controllers\WatchController;
use App\Http\Controllers\ActorController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Admin\UserController;
use App\Models\Watch_list;
use App\Models\film;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// In web.php for admin comments
Route::get('/users', function () {
    $users = User::with(['watchLists.film', 'comments.film', 'comments.show'])->get(); // Charger les relations
    return view('admin.user', compact('users')); 
})->name('admin.users');

// routes/web.php
Route::get('/film/details/{id}', [WatchController::class, 'showFilm'])->name('film.details');
Route::get('/show/details/{id}', [WatchController::class, 'showTV'])->name('show.details');
Route::get('/actor/{actor}', [ActorController::class, 'show'])->name('actor.details');



// Add (existing route):
Route::post('/watch/{id}&{id_watch}&{type}', 'App\Http\Controllers\WatchController@store')->name('add_watch')->middleware('auth');

// Remove (existing route):
Route::delete('/watch/{id}', 'App\Http\Controllers\WatchController@destroy')->name('delete')->middleware('auth');


// partie commentaire
use App\Http\Controllers\CommentController;
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::post('/comments/{comment}/report', [CommentController::class, 'report'])->name('comments.report')->middleware('auth');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comments.destroy')
    ->middleware('auth');

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

Route::post('/user_list/{id_rating}&rating', 'App\Http\Controllers\WatchController@rate')->name('submit_rating')->middleware('auth');
Route::get('/profile/{id}', 'App\Http\Controllers\ProfileController@show')->name('profile')->middleware('auth');
Route::post('/profile/{id}', 'App\Http\Controllers\ProfileController@store')->name('profile_save')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
Route::get('/profile', function () {
    return view('profile');
})->name('profile');
*/



Route::get('/watch/{id}', 'App\Http\Controllers\WatchController@index')->name('watch')->middleware('auth');
Route::post('/watch/{id}&{id_watch}&{type}', 'App\Http\Controllers\WatchController@store')->name('add_watch')->middleware('auth');
Route::get('/user_list/{id}', 'App\Http\Controllers\WatchController@show')->name('show_list')->middleware('auth');
Route::post('/watch/{id_watch}', 'App\Http\Controllers\WatchController@display')->name('display')->middleware('auth');
Route::post('/top_rate', 'App\Http\Controllers\WatchController@top_list')->name('top_list')->middleware('auth');
Route::delete('/watch/{id}', 'App\Http\Controllers\WatchController@destroy')->name('delete')->middleware('auth');
Route::post('/top_watch', 'App\Http\Controllers\WatchController@top_watch')->name('top_watch')->middleware('auth');

// Film & Show details
Route::get('/film/details/{id}', [WatchController::class, 'showFilm'])->name('film.details');
Route::get('/show/details/{id}', [WatchController::class, 'showTV'])->name('show.details');

// Default home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin routes
Route::prefix('admin')->middleware('auth', 'is_admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    // Routes depuis ta branche fatimazahra-modifs
    Route::delete('/admin/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::post('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');

    Route::get('/users', function () {
        $users = User::all();
        return view('admin.user', compact('users')); 
    })->name('admin.users'); 

    Route::get('/admin/watchlists', function () {
        $users = User::with('watchLists.film')->get(); 
        return view('admin.watchlists', compact('users')); 
    })->name('admin.watchlists')->middleware(['auth', 'is_admin']);

    // Routes depuis main
    Route::get('/archive', [App\Http\Controllers\Admin\ArchiveController::class, 'index'])->name('admin.archive');
    Route::post('/archive/add', [App\Http\Controllers\Admin\ArchiveController::class, 'add'])->name('admin.archive.add');
});

Route::post('/admin/actors/add', [App\Http\Controllers\Admin\ArchiveController::class, 'add_actor'])->name('admin.actors.add');

Auth::routes();
/*Route::get('/profile/{id}', 'App\Http\Controllers\ProfileController@show')->name('profile')->middleware('auth');*/
Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile/{id}', [ProfileController::class, 'store'])->name('profile_save');
});

Auth::routes();
