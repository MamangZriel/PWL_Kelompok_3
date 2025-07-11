<?php
// app/Models/Cinema.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'city', 'phone', 'total_seats', 'type'
    ];

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }
}