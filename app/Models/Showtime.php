<?php
// app/Models/Showtime.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\Cinema;
use App\Models\Ticket;

class Showtime extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id', 'cinema_id', 'show_date', 'show_time', 'price', 'available_seats'
    ];

    protected $casts = [
        'show_date' => 'datetime',
        'show_time' => 'datetime:H:i',
        'price' => 'decimal:2'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}