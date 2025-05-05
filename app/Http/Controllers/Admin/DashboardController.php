<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        // Return the admin dashboard view
        return view('admin.dashboard'); 
    }
}
