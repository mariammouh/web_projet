<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class BrowseController extends Controller
{
    public function index($type)
    {
        switch($type) {
            case 'movies':
                $title = 'Movies Collection';
                $content = Film::where('type', 'film')->paginate(12);
                break;
            case 'series':
                $title = 'TV Series Collection';
                $content = Show::where('type', 'series')->paginate(12);
                break;
            case 'kdrama':
                $title = 'K-Drama Collection';
                $content = Show::where('type', 'kdrama')->paginate(12);
                break;
            case 'anime':
                $title = 'Anime Collection';
                
                // Get anime films and shows using same logic as SearchController
                $films = Film::where('type', 'anime')->get();
                $shows = Show::where('type', 'anime')->get();
                
                // Merge collections
                $allAnime = $films->merge($shows);
                
                // Create paginator
                $page = request()->get('page', 1);
                $perPage = 12;
                $content = new LengthAwarePaginator(
                    $allAnime->forPage($page, $perPage),
                    $allAnime->count(),
                    $perPage,
                    $page,
                    ['path' => request()->url()]
                );
                
                // Add type indicators (similar to SearchController)
                foreach ($content->items() as $item) {
                    $item->item_type = $item instanceof Film ? 'film' : 'show';
                }
                break;
            default:
                abort(404);
        }

        return view('watch.browse', [
            'content' => $content,
            'title' => $title,
            'type' => $type
        ]);
    }
}