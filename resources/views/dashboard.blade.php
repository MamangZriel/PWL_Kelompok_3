{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </h1>
                <span class="badge bg-primary">{{ date('d F Y') }}</span>
            </div>
        </div>
    </div>

    {{-- Welcome Card --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-gradient text-white" style="background: linear-gradient(135deg, #dc3545, #fd7e14);">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-user-circle me-2"></i>
                        Selamat Datang, {{ Auth::user()->name }}!
                    </h4>
                    <p class="card-text mb-0">
                        Kelola sistem bioskop Anda dengan mudah melalui dashboard ini.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistics Cards --}}
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-film fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Total Film</h5>
                    <h3 class="text-primary mb-0">{{ \App\Models\Movie::count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-building fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Total Bioskop</h5>
                    <h3 class="text-success mb-0">{{ \App\Models\Cinema::count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-clock fa-3x text-warning mb-3"></i>
                    <h5 class="card-title">Jadwal Hari Ini</h5>
                    <h3 class="text-warning mb-0">{{ \App\Models\Showtime::whereDate('show_date', today())->count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-ticket-alt fa-3x text-danger mb-3"></i>
                    <h5 class="card-title">Total Tiket</h5>
                    <h3 class="text-danger mb-0">{{ \App\Models\Ticket::count() }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-bolt me-2"></i>Aksi Cepat
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('movies.create') }}" class="btn btn-cinema w-100">
                                <i class="fas fa-plus me-2"></i>Tambah Film
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('cinemas.create') }}" class="btn btn-cinema w-100">
                                <i class="fas fa-plus me-2"></i>Tambah Bioskop
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('showtimes.create') }}" class="btn btn-cinema w-100">
                                <i class="fas fa-plus me-2"></i>Tambah Jadwal
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Activities --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-film me-2"></i>Film Terbaru
                    </h5>
                </div>
                <div class="card-body">
                    @if(\App\Models\Movie::count() > 0)
                        @foreach(\App\Models\Movie::latest()->take(5)->get() as $movie)
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0">
                                    @if($movie->poster)
                                        <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}" 
                                             class="rounded" style="width: 50px; height: 75px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white" 
                                             style="width: 50px; height: 75px;">
                                            <i class="fas fa-film"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">{{ $movie->title }}</h6>
                                    <small class="text-muted">{{ $movie->genre }}</small>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted mb-0">Belum ada film yang ditambahkan.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-clock me-2"></i>Jadwal Hari Ini
                    </h5>
                </div>
                <div class="card-body">
                    @if(\App\Models\Showtime::whereDate('show_date', today())->count() > 0)
                        @foreach(\App\Models\Showtime::whereDate('show_date', today())->with(['movie', 'cinema'])->take(5)->get() as $showtime)
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0">
                                    <span class="badge bg-primary">{{ date('H:i', strtotime($showtime->show_time)) }}</span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">{{ $showtime->movie->title ?? 'Film tidak ditemukan' }}</h6>
                                    <small class="text-muted">{{ $showtime->cinema->name ?? 'Bioskop tidak ditemukan' }}</small>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted mb-0">Tidak ada jadwal hari ini.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection