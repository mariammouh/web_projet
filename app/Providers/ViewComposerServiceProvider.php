<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Film;
use App\Models\Show;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*', function ($view) {
            if (!isset($view->getData()['genres'])) {
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
                
                $view->with('genres', $genres);
            }
        });
    }
}