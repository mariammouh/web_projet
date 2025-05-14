<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'film_id', 
    'show_id',
    'content',
    'rating', // Ajouter
    'reports_count',
    'reported_by'
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    // Vérifie si un utilisateur a déjà signalé ce commentaire
    public function isReportedBy($userId)
    {
        if (!$this->reported_by) {
            return false;
        }
        
        return in_array($userId, explode(',', $this->reported_by));
    }

    // Ajoute un signalement
    public function addReport($userId)
    {
        if ($this->isReportedBy($userId)) {
            return false;
        }

        $this->reports_count++;
        $this->reported_by = $this->reported_by 
            ? $this->reported_by . ',' . $userId 
            : $userId;
            
        return $this->save();
    }
}