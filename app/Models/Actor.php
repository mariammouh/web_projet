<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    public function films()
{
    return $this->belongsToMany(Film::class, 'actor_film')->withPivot('role');
}

public function shows()
{
    return $this->belongsToMany(Show::class, 'actor_show')->withPivot('role');
}

}
