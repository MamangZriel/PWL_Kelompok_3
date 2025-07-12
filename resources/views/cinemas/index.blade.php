@extends('layouts.app')

@section('title', 'Daftar Bioskop')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Daftar Bioskop</h1>
                <a href="{{ route('cinemas.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Bioskop
                </a>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Cinema Cards -->
            @if($cinemas->count() > 0)
                <div class="row">
                    @foreach($cinemas as $cinema)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title">{{ $cinema->name }}</h5>
                                    <span class="badge bg-{{ $cinema->type == 'premium' ? 'warning' : ($cinema->type == 'imax' ? 'danger' : 'secondary') }}">
                                        {{ strtoupper($cinema->type) }}
                                    </span>
                                </div>
                                
                                <div class="text-muted mb-3">
                                    <div class="mb-1">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <small>{{ $cinema->address }}</small>
                                    </div>
                                    <div class="mb-1">
                                        <i class="fas fa-city"></i>
                                        <small>{{ $cinema->city }}</small>
                                    </div>
                                    <div class="mb-1">
                                        <i class="fas fa-phone"></i>
                                        <small>{{ $cinema->phone }}</small>
                                    </div>
                                    <div class="mb-1">
                                        <i class="fas fa-chair"></i>
                                        <small>{{ $cinema->total_seats }} kursi</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-footer bg-transparent">
                                <div class="btn-group w-100" role="group">
                                    <a href="{{ route('cinemas.show', $cinema->id) }}" class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('cinemas.edit', $cinema->id) }}" class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('cinemas.destroy', $cinema->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus bioskop {{ $cinema->name }}?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $cinemas->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-film fa-4x text-muted"></i>
                    </div>
                    <h4 class="text-muted">Belum ada bioskop</h4>
                    <p class="text-muted">Mulai dengan menambahkan bioskop pertama Anda</p>
                    <a href="{{ route('cinemas.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Bioskop
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Alternative Table View (uncomment if you prefer table layout) -->
<!--
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Daftar Bioskop</h1>
                <a href="{{ route('cinemas.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Bioskop
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($cinemas->count() > 0)
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Bioskop</th>
                                        <th>Kota</th>
                                        <th>Telepon</th>
                                        <th>Kapasitas</th>
                                        <th>Tipe</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cinemas as $key => $cinema)
                                    <tr>
                                        <td>{{ ($cinemas->currentPage() - 1) * $cinemas->perPage() + $key + 1 }}</td>
                                        <td>
                                            <strong>{{ $cinema->name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ Str::limit($cinema->address, 50) }}</small>
                                        </td>
                                        <td>{{ $cinema->city }}</td>
                                        <td>{{ $cinema->phone }}</td>
                                        <td>{{ $cinema->total_seats }} kursi</td>
                                        <td>
                                            <span class="badge bg-{{ $cinema->type == 'premium' ? 'warning' : ($cinema->type == 'imax' ? 'danger' : 'secondary') }}">
                                                {{ strtoupper($cinema->type) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('cinemas.show', $cinema->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('cinemas.edit', $cinema->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('cinemas.destroy', $cinema->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
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
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $cinemas->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-film fa-4x text-muted"></i>
                    </div>
                    <h4 class="text-muted">Belum ada bioskop</h4>
                    <p class="text-muted">Mulai dengan menambahkan bioskop pertama Anda</p>
                    <a href="{{ route('cinemas.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Bioskop
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
-->
@endsection