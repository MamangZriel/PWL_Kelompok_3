{{-- resources/views/showtimes/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ route('showtimes.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0"><i class="fas fa-eye me-2"></i>Detail Jadwal Tayang</h5>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Film</dt>
                <dd class="col-sm-9">{{ $showtime->movie->title ?? '-' }}</dd>

                <dt class="col-sm-3">Bioskop</dt>
                <dd class="col-sm-9">{{ $showtime->cinema->name ?? '-' }}</dd>

                <dt class="col-sm-3">Tanggal</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($showtime->show_date)->format('d-m-Y') }}</dd>

                <dt class="col-sm-3">Waktu</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($showtime->show_time)->format('H:i') }}</dd>

                <dt class="col-sm-3">Studio</dt>
                <dd class="col-sm-9">{{ $showtime->studio }}</dd>

                <dt class="col-sm-3">Tipe</dt>
                <dd class="col-sm-9">{{ $showtime->type }}</dd>

                <dt class="col-sm-3">Harga Tiket</dt>
                <dd class="col-sm-9">Rp{{ number_format($showtime->price, 0, ',', '.') }}</dd>
            </dl>
        </div>
    </div>
</div>
@endsection
