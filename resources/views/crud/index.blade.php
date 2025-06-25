@extends('layouts.app')

@section('title', 'Daftar Film')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Manajemen Film</h4>
                    <a href="{{ route('movies.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Film
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Filter -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <select class="form-select" id="genreFilter">
                                <option value="">Semua Genre</option>
                                <option value="action">Action</option>
                                <option value="comedy">Comedy</option>
                                <option value="drama">Drama</option>
                                <option value="horror">Horror</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" id="statusFilter">
                                <option value="">Semua Status</option>
                                <option value="now_showing">Sedang Tayang</option>
                                <option value="coming_soon">Coming Soon</option>
                                <option value="ended">Tidak Tayang</option>
                            </select>
                        </div>
                    </div>

                    @if($movies->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Poster</th>
                                        <th>Judul Film</th>
                                        <th>Genre</th>
                                        <th>Durasi</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th>Harga Tiket</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($movies as $movie)
                                    <tr>
                                        <td>
                                            @if($movie->poster)
                                                <img src="{{ asset('storage/' . $movie->poster) }}" 
                                                     alt="{{ $movie->title }}" class="img-thumbnail" 
                                                     style="width: 60px; height: 80px; object-fit: cover;">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                                     style="width: 60px; height: 80px;">
                                                    <i class="fas fa-film text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $movie->title }}</strong><br>
                                            <small class="text-muted">{{ $movie->release_date->format('d M Y') }}</small>
                                        </td>
                                        <td>{{ ucfirst($movie->genre) }}</td>
                                        <td>{{ $movie->duration }} min</td>
                                        <td>
                                            <span class="badge bg-warning">{{ $movie->age_rating }}</span>
                                        </td>
                                        <td>
                                            @if($movie->status == 'now_showing')
                                                <span class="badge bg-success">Sedang Tayang</span>
                                            @elseif($movie->status == 'coming_soon')
                                                <span class="badge bg-primary">Coming Soon</span>
                                            @else
                                                <span class="badge bg-secondary">Tidak Tayang</span>
                                            @endif
                                        </td>
                                        <td>Rp {{ number_format($movie->ticket_price, 0, ',', '.') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('showtimes.index', $movie->id) }}" class="btn btn-success btn-sm">
                                                    <i class="fas fa-clock"></i>
                                                </a>
                                                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" 
                                                            onclick="return confirm('Yakin ingin menghapus film ini?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            {{ $movies->links() }}
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-film fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada film yang terdaftar.</p>
                            <a href="{{ route('movies.create') }}" class="btn btn-primary">Tambah Film Pertama</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection