{{-- resources/views/movies/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1><i class="fas fa-film me-2"></i>Daftar Film</h1>
                <a href="{{ route('movies.create') }}" class="btn btn-cinema">
                    <i class="fas fa-plus me-2"></i>Tambah Film
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row">
                @forelse($movies as $movie)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if($movie->poster)
                                <img src="{{ asset('storage/' . $movie->poster) }}" class="card-img-top" alt="{{ $movie->title }}" style="height: 300px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
                                    <i class="fas fa-film fa-3x text-muted"></i>
                                </div>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="fas fa-tag me-1"></i>{{ $movie->genre }} |
                                        <i class="fas fa-clock me-1"></i>{{ $movie->duration_format }} |
                                        <i class="fas fa-star me-1"></i>{{ $movie->rating }}/10
                                    </small>
                                </p>
                                <p class="card-text">{{ Str::limit($movie->description, 100) }}</p>
                                <div class="mt-auto">
                                    <span class="badge bg-{{ $movie->status == 'now_showing' ? 'success' : ($movie->status == 'coming_soon' ? 'warning' : 'secondary') }}">
                                        {{ ucfirst(str_replace('_', ' ', $movie->status)) }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="btn-group w-100" role="group">
                                    <a href="{{ route('movies.show', $movie) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('movies.edit', $movie) }}" class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus film ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle me-2"></i>Belum ada film yang tersedia.
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center">
                {{ $movies->links() }}
            </div>
        </div>
    </div>
</div>
@endsection