{{-- resources/views/showtimes/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-plus me-2"></i>Tambah Jadwal Tayang
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('showtimes.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="movie_id" class="form-label">Film</label>
                                    <select class="form-select @error('movie_id') is-invalid @enderror" 
                                            id="movie_id" name="movie_id" required>
                                        <option value="">Pilih Film</option>
                                        @foreach($movies as $movie)
                                            <option value="{{ $movie['id'] }}" {{ old('movie_id') == $movie['id'] ? 'selected' : '' }}>
                                                {{ $movie['title'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('movie_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cinema_id" class="form-label">Bioskop</label>
                                    <select class="form-select @error('cinema_id') is-invalid @enderror" 
                                            id="cinema_id" name="cinema_id" required>
                                        <option value="">Pilih Bioskop</option>
                                        @foreach($cinemas as $cinema)
                                            <option value="{{ $cinema['id'] }}" {{ old('cinema_id') == $cinema['id'] ? 'selected' : '' }}>
                                                {{ $cinema['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('cinema_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="show_date" class="form-label">Tanggal Tayang</label>
                                    <input type="date" class="form-control @error('show_date') is-invalid @enderror" 
                                           id="show_date" name="show_date" value="{{ old('show_date') }}" required>
                                    @error('show_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="show_time" class="form-label">Waktu Tayang</label>
                                    <input type="time" class="form-control @error('show_time') is-invalid @enderror" 
                                           id="show_time" name="show_time" value="{{ old('show_time') }}" required>
                                    @error('show_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="studio" class="form-label">Studio</label>
                                    <input type="text" class="form-control @error('studio') is-invalid @enderror" 
                                           id="studio" name="studio" value="{{ old('studio') }}" 
                                           placeholder="Contoh: Studio 1" required>
                                    @error('studio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Tipe</label>
                                    <select class="form-select @error('type') is-invalid @enderror" 
                                            id="type" name="type" required>
                                        <option value="">Pilih Tipe</option>
                                        <option value="2D" {{ old('type') == '2D' ? 'selected' : '' }}>2D</option>
                                        <option value="3D" {{ old('type') == '3D' ? 'selected' : '' }}>3D</option>
                                        <option value="IMAX" {{ old('type') == 'IMAX' ? 'selected' : '' }}>IMAX</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Harga Tiket</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                               id="price" name="price" value="{{ old('price') }}" 
                                               placeholder="50000" min="0" required>
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('showtimes.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-cinema">
                                <i class="fas fa-save me-2"></i>Simpan Jadwal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection