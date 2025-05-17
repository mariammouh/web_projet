<?php

use App\Http\Controllers\WatchController;
use App\Http\Controllers\ActorController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Admin\UserController;
use App\Models\Watch_list;
use App\Models\film;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\show; 
use App\Models\comment;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/user_list/{id_rating}&rating', 'App\Http\Controllers\WatchController@rate')->name('submit_rating')->middleware('auth');
Route::get('/profile/{id}', 'App\Http\Controllers\ProfileController@show')->name('profile')->middleware('auth');
Route::post('/profile/{id}', 'App\Http\Controllers\ProfileController@store')->name('profile_save')->middleware('auth');

Route::post('/watch_search/{id}', 'App\Http\Controllers\WatchController@search')->name('search')->middleware('auth');

Route::get('/admin/comment/{id}', [App\Http\Controllers\CommentController::class, 'delete'])->name('comment.delete');

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
          $reportedComments = Comment::where('reports_count', '>', 0)
            ->with(['user:id,name', 'film:id,title', 'show:id,title']) // Use 'name' for the user table
            ->latest() // Optional: Order by creation date (latest first)
            // Or orderByDesc('reports_count') if you want to see most reported first
            ->get() // Execute the query
            ->map(function ($comment) {
                // Determine the related item title and type
                $relatedTitle = null;
                $relatedType = null;
                $relatedId = null; // Include related item ID

                if ($comment->film) {
                    $relatedTitle = $comment->film->title;
                    $relatedType = 'film';
                    $relatedId = $comment->film_id;
                } elseif ($comment->show) {
                    $relatedTitle = $comment->show->title;
                    $relatedType = 'show';
                     $relatedId = $comment->show_id;
                }

                return [
                    'id' => $comment->id, // Comment ID
                    'user_name' => $comment->user ? $comment->user->name : 'Unknown User', // Use 'name' column, add null check
                    'reports_count' => $comment->reports_count,
                    'related_type' => $relatedType, // 'film' or 'show'
                    'related_id' => $relatedId, // ID of the film or show
                    'related_title' => $relatedTitle, // Title of the film or show
                    'comment_content' => $comment->content,
                    'created_at' => $comment->created_at, // You might want the creation date too
                    // You could add a link/route here if needed for the frontend
                    // 'link' => $relatedType === 'film' ? route('films.show', $relatedId) : ($relatedType === 'show' ? route('shows.show', $relatedId) : null)
                ];
            });
        return view('admin.user', compact('users','reportedComments')); 
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
