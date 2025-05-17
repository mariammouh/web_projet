<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\film;
use App\Models\show;
use App\Models\actor;
use function Psy\debug;
use App\Models\comment;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;


class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin'); // Ensure the user is an admin
    }
    
    public function add_actor(Request $request)
    {
        // Validate request data first
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'nationality' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'biography' => 'nullable|string',
        ]);
    
        // Handle image upload
        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/img/actors/'), $filename);
            $filename = '/img/actors/' . $filename;
        }
    
        // Create and save actor
        $actor = new Actor();
        $actor->name = $validatedData['name'];
        $actor->birth_date = $validatedData['birth_date'];
        $actor->nationality = $validatedData['nationality'];
        $actor->image = $filename;
     //   $actor->biography = $validatedData['biography'] ?? null;
        $actor->save();
    
        return redirect()->route('admin.archive')->with('success', 'Actor added successfully!');
    }
    
    public function index()
    {
        // Return the admin dashboard view

        $actors= Actor::all();
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
       
        return view('admin.archive',compact('actors','reportedComments', 'reportedComments')); 
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
        
        // Convert duration
        $durationInMinutes = $request->input('duration');
        $hours = intdiv($durationInMinutes, 60);
        $minutes = $durationInMinutes % 60;
        $film->duration = sprintf('%02d:%02d:00', $hours, $minutes);

        $film->plot_summary = $request->input('plot_summary');
        $film->rating = $request->input('rating');
        $film->country = $request->input('country');
        $film->language = $request->input('language');
        $film->main_leads ="";
        // Upload poster
        if ($request->hasFile('poster')) {
            $request->validate([
                'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $file = $request->file('poster');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/img/films/'), $filename);
            $film->poster = '/img/films/' . $filename;
        } else {
            $film->poster = null;
        }

        // Upload trailer
        if ($request->hasFile('trailer')) {
            $request->validate([
                'trailer' => 'required|mimes:mp4,mov,avi,wmv|max:204800',
            ]);
            $file = $request->file('trailer');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('trailers'), $filename);
            $film->src = 'trailers/' . $filename;
        } else {
            $film->src = null;
        }

        $film->save();

        // Save selected actors to pivot table
        if ($request->has('main_leads')) {
            foreach ($request->input('main_leads') as $actorId) {
                DB::table('actor_film')->insert([
                    'film_id' => $film->id,
                    'actor_id' => $actorId,
                    'role' => null, // update if role is submitted
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

    } elseif ($request->input('media_type') === 'show') {
        $show = new show();
        $show->title = $request->input('title');
        $show->release_date = $request->input('release_date');
        $show->genre = $request->input('genre');
        $show->director = $request->input('director');
        $show->production_company = $request->input('production_company');
        $show->nbr_seasons = $request->input('nbr_seasons');
        $show->nbr_episodes = $request->input('nbr_episodes');
        $show->plot_summary = $request->input('plot_summary');
        $show->rating = $request->input('rating');
        $show->country = $request->input('country');
        $show->language = $request->input('language');
        $show->main_leads ="";

        if ($request->hasFile('poster')) {
            $request->validate([
                'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $file = $request->file('poster');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/img/shows/'), $filename);
            $show->poster = '/img/shows/' . $filename;
        } else {
            $show->poster = null;
        }

        $show->save();

        // Save selected actors to pivot table
        if ($request->has('main_leads')) {
            foreach ($request->input('main_leads') as $actorId) {
                DB::table('actor_show')->insert([
                    'show_id' => $show->id,
                    'actor_id' => $actorId,
                    'role' => null, // update if role is submitted
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    return redirect()->back()->with('success', 'Media saved successfully!');
}
}