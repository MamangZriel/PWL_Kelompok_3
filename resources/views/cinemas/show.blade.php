@extends('layouts.app')

@section('title', 'Detail Bioskop - ' . $cinema->name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Detail Bioskop</h4>
                        <div class="btn-group">
                            <a href="{{ route('cinemas.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <a href="{{ route('cinemas.edit', $cinema->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Cinema Name & Type -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h2 class="text-primary">{{ $cinema->name }}</h2>
                                <span class="badge bg-{{ $cinema->type == 'premium' ? 'warning' : ($cinema->type == 'imax' ? 'danger' : 'secondary') }} fs-6">
                                    {{ strtoupper($cinema->type) }}
                                </span>
                            </div>

                            <!-- Cinema Details -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">
                                            <i class="fas fa-map-marker-alt"></i> Alamat
                                        </h6>
                                        <p class="mb-0">{{ $cinema->address }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">
                                            <i class="fas fa-city"></i> Kota
                                        </h6>
                                        <p class="mb-0">{{ $cinema->city }}</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">
                                            <i class="fas fa-phone"></i> Nomor Telepon
                                        </h6>
                                        <p class="mb-0">
                                            <a href="tel:{{ $cinema->phone }}" class="text-decoration-none">
                                                {{ $cinema->phone }}
                                            </a>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">
                                            <i class="fas fa-chair"></i> Kapasitas
                                        </h6>
                                        <p class="mb-0">
                                            <span class="badge bg-info fs-6">{{ $cinema->total_seats }} kursi</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Info -->
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">
                                            <i class="fas fa-calendar-plus"></i> Dibuat pada
                                        </h6>
                                        <p class="mb-0">{{ $cinema->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">
                                            <i class="fas fa-calendar-edit"></i> Terakhir diupdate
                                        </h6>
                                        <p class="mb-0">{{ $cinema->updated_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-transparent">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('cinemas.index') }}" class="btn btn-secondary">
                            <i class="fas fa-list"></i> Daftar Bioskop
                        </a>
                        
                        <div class="btn-group">
                            <a href="{{ route('cinemas.edit', $cinema->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('cinemas.destroy', $cinema->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus bioskop {{ $cinema->name }}?')">
                                    <i class="fas fa-trash"></i> Hapus
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