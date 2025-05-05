<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/user_list/{id_rating}&rating', 'App\Http\Controllers\WatchController@rate')->name('submit_rating')->middleware('auth');

Route::delete('/todolist/{id_item}', 'App\Http\Controllers\todo_itemsController@destroy')->name('destroy')->middleware('auth');
Route::post('/todolist/{id_item}', 'App\Http\Controllers\todo_itemsController@complete')->name('complete')->middleware('auth');
Route::get('/profile/{id}', 'App\Http\Controllers\ProfileController@show')->name('profile')->middleware('auth');
Route::post('/profile/{id}', 'App\Http\Controllers\ProfileController@store')->name('profile_save')->middleware('auth');
Route::get('/quiz/{id}', 'App\Http\Controllers\QuizController@show')->name('quiz')->middleware('auth');
Route::post('/quiz/{id}', 'App\Http\Controllers\QuizController@store')->name('quiz_save')->middleware('auth');


Route::post('/watch_search/{id}', 'App\Http\Controllers\WatchController@search')->name('search')->middleware('auth');


Route::get('/watch/{id}', 'App\Http\Controllers\WatchController@index')->name('watch')->middleware('auth');
Route::post('/watch/{id}&{id_watch}&{type}', 'App\Http\Controllers\WatchController@store')->name('add_watch')->middleware('auth');
Route::get('/user_list/{id}', 'App\Http\Controllers\WatchController@show')->name('show_list')->middleware('auth');
Route::post('/watch/{id_watch}', 'App\Http\Controllers\WatchController@display')->name('display')->middleware('auth');
Route::post('/top_rate', 'App\Http\Controllers\WatchController@top_list')->name('top_list')->middleware('auth');
Route::delete('/watch/{id}', 'App\Http\Controllers\WatchController@destroy')->name('delete')->middleware('auth');
Route::post('/top_watch', 'App\Http\Controllers\WatchController@top_watch')->name('top_watch')->middleware('auth');

Route::get('/todolist/{id}', 'App\Http\Controllers\todo_itemsController@show')->name('todolist')->middleware('auth');
Route::post('/todolist/add/{id}', 'App\Http\Controllers\todo_itemsController@store')->name('add')->middleware('auth');

Auth::routes();

