@extends('layouts.app')

@section('title', 'Detail Tiket')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Detail Tiket #{{ $ticket->id }}</h1>
        <div class="flex space-x-3">
            <a href="{{ route('tickets.edit', $ticket->id) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-lg transition duration-300">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <a href="{{ route('tickets.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white p-6">
            <div class="flex items-center space-x-4">
                <div class="bg-white p-3 rounded-full">
                    <i class="fas fa-ticket-alt text-blue-600 text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold">{{ $ticket->movie_title }}</h2>
                    <p class="text-blue-100">{{ $ticket->genre }}</p>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informasi Film -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Informasi Film</h3>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Judul Film:</span>
                        <span class="font-medium">{{ $ticket->movie_title }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Genre:</span>
                        <span class="font-medium">{{ $ticket->genre }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Durasi:</span>
                        <span class="font-medium">{{ $ticket->duration ?? '120' }} menit</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Rating:</span>
                        <span class="font-medium">{{ $ticket->rating ?? 'PG-13' }}</span>
                    </div>
                </div>

                <!-- Informasi Tiket -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Detail Tiket</h3>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Studio:</span>
                        <span class="font-medium">Studio {{ $ticket->studio }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Kursi:</span>
                        <span class="font-medium bg-blue-100 px-2 py-1 rounded">{{ $ticket->seat_number }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tanggal:</span>
                        <span class="font-medium">{{ \Carbon\Carbon::parse($ticket->show_date)->format('d F Y') }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Jam Tayang:</span>
                        <span class="font-medium">{{ \Carbon\Carbon::parse($ticket->show_time)->format('H:i') }} WIB</span>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Status:</span>
                        @if($ticket->status == 'booked')
                            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>Dipesan
                            </span>
                        @elseif($ticket->status == 'paid')
                            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                                <i class="fas fa-money-bill-wave mr-1"></i>Dibayar
                            </span>
                        @else
                            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-gray-100 text-gray-800">
                                <i class="fas fa-clock mr-1"></i>Tersedia
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Harga -->
            <div class="mt-6 pt-6 border-t">
                <div class="flex justify-between items-center">
                    <span class="text-xl font-semibold text-gray-800">Total Harga:</span>
                    <span class="text-2xl font-bold text-green-600">Rp {{ number_format($ticket->price, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Informasi Pembeli -->
            @if($ticket->customer_name)
            <div class="mt-6 pt-6 border-t">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Informasi Pembeli</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Nama:</span>
                        <span class="font-medium">{{ $ticket->customer_name }}</span>
                    </div>
                    
                    @if($ticket->customer_email)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Email:</span>
                        <span class="font-medium">{{ $ticket->customer_email }}</span>
                    </div>
                    @endif
                    
                    @if($ticket->customer_phone)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Telepon:</span>
                        <span class="font-medium">{{ $ticket->customer_phone }}</span>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Aksi -->
            <div class="mt-6 pt-6 border-t flex justify-end space-x-3">
                @if($ticket->status == 'available')
                    <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition duration-300">
                        <i class="fas fa-shopping-cart mr-2"></i>Pesan Tiket
                    </button>
                @elseif($ticket->status == 'booked')
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-300">
                        <i class="fas fa-credit-card mr-2"></i>Bayar Sekarang
                    </button>
                @endif
                
                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus tiket ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg transition duration-300">
                        <i class="fas fa-trash mr-2"></i>Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection