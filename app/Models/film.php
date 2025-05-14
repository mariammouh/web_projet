<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class film extends Model
{
    use HasFactory;
    protected $fillable = ['id']; 
    public function actors()
{
    return $this->belongsToMany(Actor::class, 'actor_film')->withPivot('role');
}
public function comments()
{
    return $this->hasMany(Comment::class);
}


}
