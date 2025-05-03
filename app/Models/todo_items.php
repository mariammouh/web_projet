<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo_items extends Model
{
    use HasFactory;
    protected $fillable = ['task', 'completed']; 
}
