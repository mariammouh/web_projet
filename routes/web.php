<?php

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

// User routes (default)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin routes
Route::prefix('admin')->middleware('auth', 'is_admin')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
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
    
});


Auth::routes();

