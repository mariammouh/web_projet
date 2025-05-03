<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    use HasFactory;
    protected $fillable = ['task', 'questions','respond']; 
    
    protected $casts = [
        'questions' => 'array',
        'respond' => 'array',
    ];
}
