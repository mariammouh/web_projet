<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;  // Importing the User model
use App\Models\film;  // Importing the Film model
use App\Models\show; 
use App\Models\comment;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Constructor to apply middleware
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin'); // Ensure the user is an admin
    }

    public function index()
    {

        // Current date and last month's date
        $currentDate = Carbon::now();
        $lastMonthDate = Carbon::now()->subMonth();

        // Get counts for the current month
        $userCount = User::count();
        $filmCount = Film::count();
        $showCount = Show::count();

        // Get counts for the previous month
        $userCountLastMonth = User::whereBetween('created_at', [$lastMonthDate->copy()->startOfMonth(), $lastMonthDate->copy()->endOfMonth()])->count();
        $filmCountLastMonth = Film::whereBetween('created_at', [$lastMonthDate->copy()->startOfMonth(), $lastMonthDate->copy()->endOfMonth()])->count();
        $showCountLastMonth = Show::whereBetween('created_at', [$lastMonthDate->copy()->startOfMonth(), $lastMonthDate->copy()->endOfMonth()])->count();

        // Calculate percentage change since the last month
        $userChange = $this->calculatePercentageChange($userCount, $userCountLastMonth);
        $filmChange = $this->calculatePercentageChange($filmCount, $filmCountLastMonth);
        $showChange = $this->calculatePercentageChange($showCount, $showCountLastMonth);

        // Get users created in the last 6 months
        $lastSixMonths = Carbon::now()->subMonths(6);

        $userCountsRaw = User::where('created_at', '>=', $lastSixMonths)
            ->select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'), 'asc')
            ->get();

        // Initialize all 12 months to 0
        $userCountData = array_fill(1, 12, 0);

        foreach ($userCountsRaw as $record) {
            $userCountData[$record->month] = $record->count;
        }

        // Only keep the last 6 months
        $userCountValues = [];
        $monthLabels = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthNumber = (int) $month->format('n');
            $monthLabels[] = $month->format('M');
            $userCountValues[] = $userCountData[$monthNumber] ?? 0;
        }
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
       
        return view('admin.dashboard', compact(
            'userCount', 'filmCount', 'showCount',
            'userChange', 'filmChange', 'showChange',
            'userCountValues', 'monthLabels',
            'reportedComments', 'reportedComments'
        ));
        
        
    }

    // Helper method to calculate percentage change
    private function calculatePercentageChange($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0; // Handle division by zero if no records exist in the previous period
        }

        return (($current - $previous) / $previous) * 100;
    }
}
