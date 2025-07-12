@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">🎟️ Daftar Tiket</h1>

    <div class="mb-3 text-end">
        <a href="{{ route('tickets.create') }}" class="btn btn-cinema">
            <i class="fas fa-plus-circle me-1"></i> Tambah Tiket
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            @if($tickets->count())
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>🎬 Film</th>
                            <th>🏢 Studio</th>
                            <th>⏰ Jam</th>
                            <th>🎟️ Tipe Tiket</th>
                            <th>💰 Harga</th>
                            <th>⚙️ Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->movie }}</td>
                                <td>{{ $ticket->studio }}</td>
                                <td>{{ $ticket->time }}</td>
                                <td>{{ $ticket->ticket_type }}</td>
                                <td>Rp {{ number_format($ticket->total_price, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-sm btn-info text-white">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-sm btn-warning text-white">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus tiket ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-warning text-center">
                    Belum ada data tiket tersedia.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
