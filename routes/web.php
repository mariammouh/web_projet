<?php

use App\Http\Controllers\WatchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/user_list/{id_rating}&rating', 'App\Http\Controllers\WatchController@rate')->name('submit_rating')->middleware('auth');
Route::get('/profile/{id}', 'App\Http\Controllers\ProfileController@show')->name('profile')->middleware('auth');
Route::post('/profile/{id}', 'App\Http\Controllers\ProfileController@store')->name('profile_save')->middleware('auth');


Route::post('/watch_search/{id}', 'App\Http\Controllers\WatchController@search')->name('search')->middleware('auth');


Route::get('/watch/{id}', 'App\Http\Controllers\WatchController@index')->name('watch')->middleware('auth');
Route::post('/watch/{id}&{id_watch}&{type}', 'App\Http\Controllers\WatchController@store')->name('add_watch')->middleware('auth');
Route::get('/user_list/{id}', 'App\Http\Controllers\WatchController@show')->name('show_list')->middleware('auth');
Route::post('/watch/{id_watch}', 'App\Http\Controllers\WatchController@display')->name('display')->middleware('auth');
Route::post('/top_rate', 'App\Http\Controllers\WatchController@top_list')->name('top_list')->middleware('auth');
Route::delete('/watch/{id}', 'App\Http\Controllers\WatchController@destroy')->name('delete')->middleware('auth');
Route::post('/top_watch', 'App\Http\Controllers\WatchController@top_watch')->name('top_watch')->middleware('auth');

// routes/web.php
Route::get('/film/details/{id}', [WatchController::class, 'showFilm'])->name('film.details');
Route::get('/show/details/{id}', [WatchController::class, 'showTV'])->name('show.details');
Route::get('/actor/{actor}', [ActorController::class, 'show'])->name('actor.details');

// User routes (default)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Remplacer la route existante
// Admin routes
Route::prefix('admin')->middleware('auth', 'is_admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/archive', [App\Http\Controllers\Admin\ArchiveController::class, 'index'])->name('admin.archive');
    Route::post('/archive/add', [App\Http\Controllers\Admin\ArchiveController::class, 'add'])->name('admin.archive.add');
});
Route::post('/admin/actors/add', [App\Http\Controllers\Admin\ArchiveController::class, 'add_actor'])->name('admin.actors.add');

Auth::routes();

