<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('Tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('Tickets.create');
    }

    public function book(Request $request)
    {
        $request->validate([
            'movie' => 'required|string',
            'time' => 'required|string',
            'studio' => 'required|string',
            'ticket_type' => 'required|string',
            'seats' => 'required|array|min:1',
            'total_price' => 'required|numeric|min:0'
        ]);

        $booking = [
            'id' => rand(1000, 9999),
            'movie' => $request->movie,
            'time' => $request->time,
            'studio' => $request->studio,
            'ticket_type' => $request->ticket_type,
            'seats' => $request->seats,
            'total_price' => $request->total_price,
            'booking_date' => now(),
            'user_id' => Auth::id() ?? null
        ];

        Session::put('last_booking', $booking);

        return response()->json([
            'success' => true,
            'message' => 'Tiket berhasil dipesan!',
            'booking_id' => $booking['id'],
            'booking' => $booking
        ]);
    }

    public function myTickets()
    {
        $booking = Session::get('last_booking');
        $tickets = $booking ? [$booking] : [];

        return view('my-tickets', compact('tickets'));
    }

public function store(Request $request)
{
    $request->validate([
        'movie' => 'required|string',
        'studio' => 'required|string',
        'time' => 'required',
        'ticket_type' => 'required|string',
        'total_price' => 'required|numeric',
    ]);

    $ticket = Ticket::create([
        'movie' => $request->movie,
        'studio' => $request->studio,
        'time' => $request->time,
        'ticket_type' => $request->ticket_type,
        'total_price' => $request->total_price,
    ]);

    Session::put('last_ticket', $ticket);

    return redirect()->route('tickets.index')->with('success', 'Tiket berhasil ditambahkan!');
}
}