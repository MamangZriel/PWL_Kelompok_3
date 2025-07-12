<?php
// app/Models/Ticket.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['movie', 'studio', 'time', 'ticket_type', 'total_price'];
}