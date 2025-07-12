<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'movie',
        'time',
        'studio',
        'ticket_type',
        'seats',
        'total_price',
        'status'
    ];

    protected $casts = [
        'seats' => 'array',
        'total_price' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}