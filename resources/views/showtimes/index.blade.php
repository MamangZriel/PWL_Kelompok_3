@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0"><i class="fas fa-film me-2"></i>Jadwal Tayang</h4>
        <a href="{{ route('showtimes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Jadwal
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(empty($showtimes))
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle me-2"></i>Belum ada jadwal tayang.
        </div>
    @else
        @foreach($showtimes as $showtime)
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between">
                    <strong>{{ $showtime['movie'] }}</strong>
                    <div>
                        <a href="{{ route('showtimes.edit', $showtime['id']) }}" class="btn btn-sm btn-warning me-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('showtimes.destroy', $showtime['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus jadwal ini?')" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($showtime['times'] as $time)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>
                                    <i class="fas fa-clock me-2"></i>{{ $time['time'] }} |
                                    {{ $time['studio'] }} |
                                    {{ $time['type'] }}
                                </span>
                                <a href="{{ route('showtimes.show', $showtime['id']) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
