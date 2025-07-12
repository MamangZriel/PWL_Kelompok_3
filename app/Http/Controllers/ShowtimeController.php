<?php
// app/Http/Controllers/ShowtimeController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowtimeController extends Controller
{
    public function index()
    {
        // Ambil data jadwal film
        $showtimes = [
            [
                'id' => 1,
                'movie' => 'Jumbo',
                'times' => [
                    ['time' => '10:00', 'studio' => 'Studio 1', 'type' => '2D'],
                    ['time' => '13:30', 'studio' => 'Studio 2', 'type' => '2D'],
                    ['time' => '16:00', 'studio' => 'Studio 1', 'type' => '2D'],
                    ['time' => '19:30', 'studio' => 'Studio 3', 'type' => 'IMAX']
                ]
            ],
        ];

        return view('showtimes.index', compact('showtimes'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat jadwal baru
        $movies = [
            ['id' => 1, 'title' => 'Jumbo'],
        ];


        $cinemas = [
            ['id' => 1, 'name' => 'Cinema XXI Plaza'],
            ['id' => 2, 'name' => 'CGV Grand Mall'],
            ['id' => 3, 'name' => 'Cinepolis City Center']
        ];

        return view('showtimes.create', compact('movies', 'cinemas'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'movie_id' => 'required',
            'cinema_id' => 'required',
            'show_date' => 'required|date',
            'show_time' => 'required',
            'studio' => 'required|string|max:50',
            'type' => 'required|in:2D,3D,IMAX',
            'price' => 'required|numeric|min:0'
        ]);

        // Simpan data (untuk sementara hanya redirect dengan pesan sukses)
        return redirect()->route('showtimes.index')
            ->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function show($id)
    {
        // Detail jadwal untuk film tertentu
        return response()->json(['success' => true, 'showtime_id' => $id]);
    }

    public function edit($id)
    {
        // Menampilkan form edit jadwal
        $movies = [
            ['id' => 1, 'title' => 'Jumbo'],
        ];

        $cinemas = [
            ['id' => 1, 'name' => 'Cinema XXI Plaza'],
            ['id' => 2, 'name' => 'CGV Grand Mall'],
            ['id' => 3, 'name' => 'Cinepolis City Center']
        ];

        // Data dummy untuk edit
        $showtime = [
            'id' => $id,
            'movie_id' => 1,
            'cinema_id' => 1,
            'show_date' => date('Y-m-d'),
            'show_time' => '19:30',
            'studio' => 'Studio 1',
            'type' => '2D',
            'price' => 50000
        ];

        return view('showtimes.edit', compact('showtime', 'movies', 'cinemas'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'movie_id' => 'required',
            'cinema_id' => 'required',
            'show_date' => 'required|date',
            'show_time' => 'required',
            'studio' => 'required|string|max:50',
            'type' => 'required|in:2D,3D,IMAX',
            'price' => 'required|numeric|min:0'
        ]);

        // Update data (untuk sementara hanya redirect dengan pesan sukses)
        return redirect()->route('showtimes.index')
            ->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Hapus jadwal
        return redirect()->route('showtimes.index')
            ->with('success', 'Jadwal berhasil dihapus!');
    }
}