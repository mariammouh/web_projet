<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\film;
use App\Models\show;

use function Psy\debug;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin'); // Ensure the user is an admin
    }

    public function index()
    {
        // Return the admin dashboard view
        return view('admin.archive'); 
    }
    public function add(Request $request)
    {
        

        if ($request->input('media_type') === 'film') {
            $film = new film();
            $film->title = $request->input('title');
            $film->release_date = $request->input('release_date');
            $film->genre = $request->input('genre');
            $film->director = $request->input('director');
            $film->production_company = $request->input('production_company');
            
            $durationInMinutes = $request->input('duration');
$hours = intdiv($durationInMinutes, 60);
$minutes = $durationInMinutes % 60;

$timeFormat = sprintf('%02d:%02d:00', $hours, $minutes); 
$film->duration = $timeFormat;
            $film->main_leads = $request->input('main_leads');
            $film->plot_summary = $request->input('plot_summary');
            $film->rating = $request->input('rating');
            $film->country = $request->input('country');
            $film->language = $request->input('language');
          
            $film->src = $request->input('src');
         //   dd($request->all());
        if ($request->hasFile('poster')) {
            $request->validate([
                'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            ]); 
            
            $file = $request->file('poster');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/img/films/'), $filename);
            $filename=   '/img/films/' .  $filename;
        } else {
         
            $filename = $film->poster;
            error_log($filename);
        }
        $film->poster = $filename;
        if ($request->hasFile('trailer')) {
            $request->validate([
                'trailer' => 'required|mimes:mp4,mov,avi,wmv|max:204800', // max size ~200MB
            ]);
        
            $file = $request->file('trailer');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('trailers'), $filename);
            $trailerPath = 'trailers/' . $filename;
        } else {
            $trailerPath = null; // or fallback path if needed
            error_log('No trailer uploaded.');
        }
        $film->src=$trailerPath;
            $film->save();
           
        } elseif ($request->input('media_type') === 'show') {
            $show = new show();
            $show->title = $request->input('title');
            $show->release_date = $request->input('release_date');
            $show->genre = $request->input('genre');
            $show->director = $request->input('director');
            $show->production_company = $request->input('production_company');
            $show->nbr_seasons = $request->input('nbr_seasons');
            $show->nbr_episodes = $request->input('nbr_episodes');
            $show->main_leads = $request->input('main_leads');
            $show->plot_summary = $request->input('plot_summary');
            $show->rating = $request->input('rating');
            $show->country = $request->input('country');
            $show->language = $request->input('language');
            if ($request->hasFile('poster')) {
                $request->validate([
                    'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
                ]); 
                
                $file = $request->file('poster');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/img/shows/'), $filename);
                $filename=   '/img/shows/' .  $filename;
            } else {
             
                $filename = $show->poster;
                error_log($filename);
            }
            $show->poster = $filename;
            $show->save();
        }
       
        return redirect()->back()->with('success', 'Media saved successfully!');
        // Return the admin dashboard view
      //   return redirect("admin/archive"); 
    }

}
