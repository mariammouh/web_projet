<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class show extends Model
{
    use HasFactory;
    public function actors()
{
    return $this->belongsToMany(Actor::class, 'actor_show')->withPivot('role');
}
public function comments()
{
    return $this->hasMany(Comment::class);
}
}
