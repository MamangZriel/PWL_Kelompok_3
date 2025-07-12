{{-- resources/views/showtimes/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-edit me-2"></i>Edit Jadwal Tayang</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('showtimes.update', $showtime->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Movie --}}
                        <div class="mb-3">
                            <label for="movie_id" class="form-label">Film</label>
                            <select class="form-select @error('movie_id') is-invalid @enderror" name="movie_id" id="movie_id">
                                <option value="">Pilih Film</option>
                                @foreach($movies as $movie)
                                    <option value="{{ $movie->id }}" {{ $showtime->movie_id == $movie->id ? 'selected' : '' }}>
                                        {{ $movie->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('movie_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Cinema --}}
                        <div class="mb-3">
                            <label for="cinema_id" class="form-label">Bioskop</label>
                            <select class="form-select @error('cinema_id') is-invalid @enderror" name="cinema_id" id="cinema_id">
                                <option value="">Pilih Bioskop</option>
                                @foreach($cinemas as $cinema)
                                    <option value="{{ $cinema->id }}" {{ $showtime->cinema_id == $cinema->id ? 'selected' : '' }}>
                                        {{ $cinema->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('cinema_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tanggal & Waktu --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="show_date" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control @error('show_date') is-invalid @enderror"
                                           name="show_date" id="show_date"
                                           value="{{ old('show_date', $showtime->show_date) }}">
                                    @error('show_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="show_time" class="form-label">Waktu</label>
                                    <input type="time" class="form-control @error('show_time') is-invalid @enderror"
                                           name="show_time" id="show_time"
                                           value="{{ old('show_time', $showtime->show_time) }}">
                                    @error('show_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Studio --}}
                        <div class="mb-3">
                            <label for="studio" class="form-label">Studio</label>
                            <input type="text" class="form-control @error('studio') is-invalid @enderror"
                                   name="studio" id="studio"
                                   value="{{ old('studio', $showtime->studio) }}">
                            @error('studio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Type --}}
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe</label>
                            <select class="form-select @error('type') is-invalid @enderror" name="type" id="type">
                                <option value="">Pilih Tipe</option>
                                @foreach(['2D', '3D', 'IMAX'] as $type)
                                    <option value="{{ $type }}" {{ $showtime->type == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Harga --}}
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                       name="price" id="price"
                                       value="{{ old('price', $showtime->price) }}" min="0">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('showtimes.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i>Update
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
