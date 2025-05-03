<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class watch_list extends Model
{
    use HasFactory;
    protected $fillable = ['id_user', 'film_id','show_id','rating_user']; 
}
