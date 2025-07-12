@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">✏️ Edit Tiket</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">🎬 Judul Film</label>
                    <input type="text" name="movie" class="form-control" value="{{ $ticket->movie }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">🏢 Studio</label>
                    <input type="text" name="studio" class="form-control" value="{{ $ticket->studio }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">⏰ Jam Tayang</label>
                    <input type="time" name="time" class="form-control" value="{{ $ticket->time }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">🎟️ Tipe Tiket</label>
                    <input type="text" name="ticket_type" class="form-control" value="{{ $ticket->ticket_type }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">💰 Harga</label>
                    <input type="number" name="total_price" class="form-control" value="{{ $ticket->total_price }}" required>
                </div>

                <button type="submit" class="btn btn-cinema">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
