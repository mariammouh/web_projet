<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Show;
use Illuminate\Http\Request;

class HomeController extends Controller
{
public function index()
{
    // Get genres
    $filmGenres = Film::select('genre')->distinct()->pluck('genre');
    $showGenres = Show::select('genre')->distinct()->pluck('genre');
    
    $genres = collect($filmGenres)
        ->merge($showGenres)
        ->filter()
        ->flatMap(function($item) {
            return array_map('trim', explode(',', $item));
        })
        ->unique()
        ->sort()
        ->values();

    return view('home', [
        'movies' => Film::where('type', 'film')->latest()->take(6)->get(),
        'series' => Show::where('type', 'series')->latest()->take(6)->get(),
        'kdramas' => Show::where('type', 'kdrama')->latest()->take(6)->get(),
        'anime' => [
            'all' => collect()
                ->merge(Film::where('type', 'anime')->latest()->take(3)->get())
                ->merge(Show::where('type', 'anime')->latest()->take(3)->get())
                ->shuffle()
        ],
        'genres' => $genres
    ]);
}
}