@extends('layouts.app')

@section('title', 'Edit Bioskop - ' . $cinema->name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Edit Bioskop</h4>
                        <div class="btn-group">
                            <a href="{{ route('cinemas.show', $cinema->id) }}" class="btn btn-info">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            <a href="{{ route('cinemas.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('cinemas.update', $cinema->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Bioskop <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name', $cinema->name) }}" 
                                           placeholder="Masukkan nama bioskop">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city" class="form-label">Kota <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('city') is-invalid @enderror" 
                                           id="city" 
                                           name="city" 
                                           value="{{ old('city', $cinema->city) }}" 
                                           placeholder="Masukkan nama kota">
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('address') is-invalid @enderror" 
                                      id="address" 
                                      name="address" 
                                      rows="3" 
                                      placeholder="Masukkan alamat lengkap bioskop">{{ old('address', $cinema->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                                    <input type="tel" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone', $cinema->phone) }}" 
                                           placeholder="Contoh: 021-1234567">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="total_seats" class="form-label">Total Kursi <span class="text-danger">*</span></label>
                                    <input type="number" 
                                           class="form-control @error('total_seats') is-invalid @enderror" 
                                           id="total_seats" 
                                           name="total_seats" 
                                           value="{{ old('total_seats', $cinema->total_seats) }}" 
                                           min="1" 
                                           placeholder="Masukkan jumlah kursi">
                                    @error('total_seats')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe Bioskop <span class="text-danger">*</span></label>
                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                                <option value="">Pilih tipe bioskop</option>
                                <option value="regular" {{ old('type', $cinema->type) == 'regular' ? 'selected' : '' }}>Regular</option>
                                <option value="premium" {{ old('type', $cinema->type) == 'premium' ? 'selected' : '' }}>Premium</option>
                                <option value="imax" {{ old('type', $cinema->type) == 'imax' ? 'selected' : '' }}>IMAX</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Info -->
                        <div class="alert alert-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <small>
                                        <i class="fas fa-info-circle"></i> 
                                        Dibuat: {{ $cinema->created_at->format('d M Y, H:i') }}
                                    </small>
                                </div>
                                <div class="col-md-6">
                                    <small>
                                        <i class="fas fa-edit"></i> 
                                        Terakhir diupdate: {{ $cinema->updated_at->format('d M Y, H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('cinemas.show', $cinema->id) }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection