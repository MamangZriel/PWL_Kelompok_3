@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                @if($movie->poster)
                    <img src="{{ asset('storage/' . $movie->poster) }}" class="card-img-top" alt="{{ $movie->title }}" style="height: 500px; object-fit: cover;">
                @else
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 500px;">
                        <i class="fas fa-film fa-5x text-muted"></i>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>{{ $movie->title }}</h3>
                        <span class="badge bg-{{ $movie->status == 'now_showing' ? 'success' : ($movie->status == 'coming_soon' ? 'warning' : 'secondary') }} fs-6">
                            {{ ucfirst(str_replace('_', ' ', $movie->status)) }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6><i class="fas fa-tag me-2"></i>Genre</h6>
                            <p class="text-muted">{{ $movie->genre }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6><i class="fas fa-clock me-2"></i>Durasi</h6>
                            <p class="text-muted">{{ $movie->duration_format }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6><i class="fas fa-calendar me-2"></i>Tanggal Rilis</h6>
                            <p class="text-muted">{{ $movie->release_date->format('d F Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6><i class="fas fa-star me-2"></i>Rating</h6>
                            <p class="text-muted">
                                {{ $movie->rating }}/10
                                <span class="ms-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($movie->rating >= $i * 2)
                                            <i class="fas fa-star text-warning"></i>
                                        @elseif($movie->rating >= ($i * 2) - 1)
                                            <i class="fas fa-star-half-alt text-warning"></i>
                                        @else
                                            <i class="far fa-star text-warning"></i>
                                        @endif
                                    @endfor
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6><i class="fas fa-user me-2"></i>Sutradara</h6>
                        <p class="text-muted">{{ $movie->director }}</p>
                    </div>

                    <div class="mb-3">
                        <h6><i class="fas fa-users me-2"></i>Pemeran</h6>
                        <p class="text-muted">{{ $movie->cast }}</p>
                    </div>

                    <div class="mb-3">
                        <h6><i class="fas fa-align-left me-2"></i>Deskripsi</h6>
                        <p class="text-muted">{{ $movie->description }}</p>
                    </div>

                    <div class="mb-3">
                        <h6><i class="fas fa-info-circle me-2"></i>Informasi Tambahan</h6>
                        <small class="text-muted">
                            <i class="fas fa-calendar-plus me-1"></i>Ditambahkan: {{ $movie->created_at->format('d F Y, H:i') }} |
                            <i class="fas fa-edit me-1"></i>Terakhir diupdate: {{ $movie->updated_at->format('d F Y, H:i') }}
                        </small>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('movies.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <div>
                            <a href="{{ route('movies.edit', $movie) }}" class="btn btn-warning">
                                <i class="fas fa-edit me-2"></i>Edit
                            </a>
                            <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus film ini?')">
                                    <i class="fas fa-trash me-2"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection