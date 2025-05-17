<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Show;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query', '');
        $type = $request->input('type', 'all');
        $genre = $request->input('genre', '');
        
        $results = collect();
        
        // Search films
        if ($type === 'all' || $type === 'movie' || $type === 'anime') {
            $films = Film::query()
                ->when($type !== 'all', function($q) use ($type) {
                    return $q->where('type', $type === 'movie' ? 'film' : 'anime');
                })
                ->when($query, function($q) use ($query) {
                    return $q->where('title', 'LIKE', "%{$query}%");
                })
                ->when($genre, function($q) use ($genre) {
                    return $q->where('genre', 'LIKE', "%{$genre}%");
                })
                ->paginate(12);
            
            $results = $results->merge($films->items());
        }
        
        // Search shows
        if ($type === 'all' || in_array($type, ['series', 'kdrama', 'anime'])) {
            $shows = Show::query()
                ->when($type !== 'all', function($q) use ($type) {
                    return $q->where('type', $type);
                })
                ->when($query, function($q) use ($query) {
                    return $q->where('title', 'LIKE', "%{$query}%");
                })
                ->when($genre, function($q) use ($genre) {
                    return $q->where('genre', 'LIKE', "%{$genre}%");
                })
                ->paginate(12);
            
            $results = $results->merge($shows->items());
        }
        
        // Get all unique genres for the dropdown
        $filmGenres = Film::select('genre')->distinct()->get()->flatMap(function($film) {
            return explode(', ', $film->genre);
        })->unique()->filter()->values();
        
        $showGenres = Show::select('genre')->distinct()->get()->flatMap(function($show) {
            return explode(', ', $show->genre);
        })->unique()->filter()->values();
        
        $allGenres = $filmGenres->merge($showGenres)->unique()->sort();
        
        return view('watch.search', [
            'results' => $results,
            'query' => $query,
            'type' => $type,
            'genre' => $genre,
            'genres' => $allGenres,
            'pagination' => $films ?? $shows ?? null
        ]);
    }
}