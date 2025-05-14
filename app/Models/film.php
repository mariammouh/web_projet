<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class film extends Model
{
    use HasFactory;
     protected $fillable = [
        'title',
        'release_date',
        'genre',
        'director',
        'production_company',
        'duration',
        'main_leads',
        'plot_summary',
        'rating',
        'country',
        'language',
        'poster',
        'src',
    ];
    public function actors()
{
    return $this->belongsToMany(Actor::class, 'actor_film')->withPivot('role');
}
public function comments()
{
    return $this->hasMany(Comment::class);
}


}
