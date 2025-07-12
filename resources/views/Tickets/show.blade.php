@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">🎬 Detail Tiket</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>🎬 Film:</strong> {{ $ticket->movie }}</p>
            <p><strong>🏢 Studio:</strong> {{ $ticket->studio }}</p>
            <p><strong>⏰ Jam Tayang:</strong> {{ $ticket->time }}</p>
            <p><strong>🎟️ Tipe Tiket:</strong> {{ $ticket->ticket_type }}</p>
            <p><strong>💰 Harga:</strong> Rp {{ number_format($ticket->total_price, 0, ',', '.') }}</p>

            <a href="{{ route('tickets.index') }}" class="btn btn-secondary mt-3">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar
            </a>
        </div>
    </div>
</div>
@endsection
