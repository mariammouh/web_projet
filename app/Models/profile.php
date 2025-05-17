<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $incrementing = false; // Désactive l'auto-incrémentation
    protected $keyType = 'int'; // Type de la clé primaire

    protected $fillable = [
        'id', 'address', 'phone', 'bio', 'pic', 'title', 
        'school', 'website', 'city', 'country', 'postal_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}