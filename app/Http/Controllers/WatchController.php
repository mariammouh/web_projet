<?php

namespace App\Http\Controllers;

use App\Models\film;
use App\Models\show;
use App\Models\watch_list;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Auth;
use Ramsey\Collection\Set;

class WatchController extends Controller
{
    public function search($id)
    {
        $query = request('search');

        $films = film::where('title', 'like', '%' . $query . '%')
            ->orWhere('plot_summary', 'like', '%' . $query . '%')
            ->orWhere('genre', 'like', '%' . $query . '%')
            ->orWhere('main_leads', 'like', '%' . $query . '%')
            ->orWhere('release_date', 'like', '%' . $query . '%')
            ->orWhere('director', 'like', '%' . $query . '%')
            ->get();
        $shows = show::where('title', 'like', '%' . $query . '%')
            ->orWhere('plot_summary', 'like', '%' . $query . '%')
            ->orWhere('genre', 'like', '%' . $query . '%')
            ->orWhere('main_leads', 'like', '%' . $query . '%')
            ->orWhere('release_date', 'like', '%' . $query . '%')
            ->orWhere('director', 'like', '%' . $query . '%')
            ->get();
        $allfilms = film::join('watch_lists', 'watch_lists.film_id', '=', 'films.id')
            ->where('watch_lists.user_id', $id)
            ->get();

        $allshows = show::join('watch_lists', 'watch_lists.show_id', '=', 'shows.id')
            ->where('watch_lists.user_id', $id)
            ->get();

        $allList = $allfilms->concat($allshows);
        return view('search_list', ['allFilms' => $films, 'allShows' => $shows, 'allList' => $allList, 'query' => $query]);
    }
    public function top_list()
    {
        $allfilms = Film::join('watch_lists', 'watch_lists.film_id', '=', 'films.id')
            ->selectRaw(' AVG(watch_lists.rating_user) AS average_rating,
            films.id,
            films.title,
            films.genre,
            films.release_date,
            films.director,
            films.production_company,
            films.duration,
            films.main_leads,
            films.plot_summary,
            films.rating,
            films.country,
            films.language,
            films.poster,
            films.created_at,
            films.updated_at,
            films.src,
            watch_lists.id AS watch_list_id,
            watch_lists.user_id,
            watch_lists.film_id,
            watch_lists.show_id,
            watch_lists.date_watching,
           
            watch_lists.updated_at,
            watch_lists.created_at
        ')
            ->groupBy(
                'watch_lists.film_id',
                'films.id',
                'films.title',
                'films.genre',
                'films.release_date',
                'films.director',
                'films.production_company',
                'films.duration',
                'films.main_leads',
                'films.plot_summary',
                'films.rating',
                'films.country',
                'films.language',
                'films.poster',
                'films.created_at',
                'films.updated_at',
                'films.src',
                'watch_lists.id',
                'watch_lists.user_id',
                'watch_lists.film_id',
                'watch_lists.show_id',
                'watch_lists.date_watching',
                'watch_lists.updated_at',
                'watch_lists.created_at'
            )
            ->orderByDesc('average_rating')
            ->distinct()->whereNotNull('rating_user')
            ->get();
        $allfilm  = collect($allfilms)->unique('film_id');


        $allshows = Show::join('watch_lists', 'watch_lists.show_id', '=', 'shows.id')
            ->selectRaw('
            shows.id,
            shows.title,
            shows.genre,
            shows.release_date,
            shows.director,
            shows.production_company,
            shows.nbr_seasons,
            shows.main_leads,
            shows.plot_summary,
            shows.rating,
            shows.country,
            shows.language,
            shows.poster,
            shows.created_at,
            shows.updated_at,
            shows.nbr_episodes,
            watch_lists.id AS watch_list_id,
            watch_lists.user_id,
            watch_lists.film_id,
            watch_lists.show_id,
            watch_lists.date_watching,
            AVG(watch_lists.rating_user) AS average_rating,
            watch_lists.updated_at,
            watch_lists.created_at
        ')
            ->groupBy(
                'shows.id',
                'shows.title',
                'shows.genre',
                'shows.release_date',
                'shows.director',
                'shows.production_company',
                'shows.nbr_seasons',
                'shows.main_leads',
                'shows.plot_summary',
                'shows.rating',
                'shows.country',
                'shows.language',
                'shows.poster',
                'shows.created_at',
                'shows.updated_at',
                'shows.nbr_episodes',
                'watch_lists.id',
                'watch_lists.user_id',
                'watch_lists.film_id',
                'watch_lists.show_id',
                'watch_lists.date_watching',
                'watch_lists.updated_at',
                'watch_lists.created_at'
            )
            ->orderByDesc('average_rating')
            ->distinct()->whereNotNull('rating_user')
            ->get();
        $allshow  = collect($allshows)->unique('show_id');
        $allList = $allfilm->concat($allshow);

        return view('top_list', ['allList' => $allList]);
    }
    public function show($id)
    {
        $allfilms = film::join('watch_lists', 'watch_lists.film_id', '=', 'films.id')
            ->where('watch_lists.user_id', $id)
            ->get();

        $allshows = show::join('watch_lists', 'watch_lists.show_id', '=', 'shows.id')
            ->where('watch_lists.user_id', $id)
            ->get();

        $allList = $allfilms->concat($allshows);
        error_log($allList);
        return view('user_list', ['allList' => $allList]);
    }
    public function rate($id)
    {

        $watch = watch_list::findOrFail($id);



        $watch->update([
            'rating_user' => request('rating_stare'),
        ]);
        error_log("rattttinnnnnnnnnnnnnnnnn" . var_dump($watch->rating_user));

        error_log("ratttt" . request('rating_stare') . "and" . $id);
        return redirect("user_list/$watch->user_id");
    }
    public function display($id)
    {
        $watch = film::findOrfail($id);
        return view('display', ['watch' => $watch]);
    }
    public function destroy($id)
    {
        $watch = watch_list::findorfail($id);

        $watch->delete();
        var_dump($watch->user_id);
        return redirect()->back()->with('message', 'Data updated successfully.');
    }

    public function index($id)
    {
        $films = film::all();
        $shows = show::all();
        $allfilms = film::join('watch_lists', 'watch_lists.film_id', '=', 'films.id')
            ->where('watch_lists.user_id', $id)
            ->get();

        $allshows = show::join('watch_lists', 'watch_lists.show_id', '=', 'shows.id')
            ->where('watch_lists.user_id', $id)
            ->get();

        $allList = $allfilms->concat($allshows);
        return view('watch_list', ['allFilms' => $films, 'allShows' => $shows, 'allList' => $allList]);
    }
    public function store($id_user, $id_watch, $type, Request $request)
    {

        error_log($id_watch);
        $watch = new watch_list();
        $watch->user_id = $id_user;
        if ($type === "film") {
            $watch->film_id = $id_watch;
            $watch->show_id = null;
        } elseif ($type === "show")
            $watch->show_id = $id_watch;
        $watch->date_watching = now();
        $watch->saveOrFail();
        return redirect()->back()->with('message', 'Data updated successfully.');
    }
}
