<?php
// app/Models/Movie.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'genre', 'duration', 'director', 
        'cast', 'release_date', 'poster', 'rating', 'status'
    ];

    protected $casts = [
        'release_date' => 'date',
        'rating' => 'decimal:1'
    ];

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }

    public function getDurationFormatAttribute()
    {
        $hours = floor($this->duration / 60);
        $minutes = $this->duration % 60;
        return "{$hours}h {$minutes}m";
    }
}