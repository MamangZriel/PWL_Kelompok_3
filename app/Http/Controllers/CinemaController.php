<?php
// app/Http/Controllers/CinemaController.php
namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function index()
    {
        $cinemas = Cinema::latest()->paginate(10);
        return view('cinemas.index', compact('cinemas'));
    }

    public function create()
    {
        return view('cinemas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'total_seats' => 'required|integer|min:1',
            'type' => 'required|in:regular,premium,imax'
        ]);

        Cinema::create($request->all());

        return redirect()->route('cinemas.index')
                        ->with('success', 'Bioskop berhasil ditambahkan!');
    }

    public function show(Cinema $cinema)
    {
        return view('cinemas.show', compact('cinema'));
    }

    public function edit(Cinema $cinema)
    {
        return view('cinemas.edit', compact('cinema'));
    }

    public function update(Request $request, Cinema $cinema)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'total_seats' => 'required|integer|min:1',
            'type' => 'required|in:regular,premium,imax'
        ]);

        $cinema->update($request->all());

        return redirect()->route('cinemas.index')
                        ->with('success', 'Bioskop berhasil diperbarui!');
    }

    public function destroy(Cinema $cinema)
    {
        $cinema->delete();

        return redirect()->route('cinemas.index')
                        ->with('success', 'Bioskop berhasil dihapus!');
    }
}