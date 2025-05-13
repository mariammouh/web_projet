<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class show extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'release_date', 'genre', 'director', 'production_company', 'nbr_seasons', 'nbr_episodes', 'main_leads', 'plot_summary', 'rating', 'country', 'language', 'poster'];
}
