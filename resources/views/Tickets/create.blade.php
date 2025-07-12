@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mx-auto shadow-sm" style="max-width: 600px;">
        <div class="card-body">
            <h4 class="mb-4 text-center">🎟️ Tambah Tiket Baru</h4>

            <form action="{{ route('tickets.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">🎬 Judul Film</label>
                    <input type="text" name="movie" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">🏢 Studio</label>
                    <input type="text" name="studio" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">⏰ Jam Tayang</label>
                    <input type="time" name="time" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">🎟️ Tipe Tiket</label>
                    <input type="text" name="ticket_type" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">💰 Harga</label>
                    <input type="number" name="total_price" class="form-control" required>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-cinema">
                        <i class="fas fa-save me-1"></i> Simpan Tiket
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
