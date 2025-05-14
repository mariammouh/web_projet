<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class watch_list extends Model
{
    use HasFactory;
    protected $table = 'watch_lists'; 
    protected $fillable = ['id_user', 'film_id','show_id','rating_user'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function film()
    {
        return $this->belongsTo(film::class, 'film_id');  // film_id est la clé étrangère dans watch_lists
    }
    public function show()
{
    return $this->belongsTo(Show::class, 'show_id');
}
    
     
}