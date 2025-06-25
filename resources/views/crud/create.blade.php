@extends('layouts.app')

@section('title', 'Buat Tiket Baru')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Buat Tiket Baru</h1>
        <a href="{{ route('tickets.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informasi Film -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Informasi Film</h3>
                    
                    <div>
                        <label for="movie_title" class="block text-sm font-medium text-gray-700 mb-1">
                            Judul Film <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="movie_title" name="movie_title" value="{{ old('movie_title') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('movie_title') border-red-500 @enderror" 
                               placeholder="Masukkan judul film" required>
                        @error('movie_title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="genre" class="block text-sm font-medium text-gray-700 mb-1">
                            Genre <span class="text-red-500">*</span>
                        </label>
                        <select id="genre" name="genre" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('genre') border-red-500 @enderror" required>
                            <option value="">Pilih Genre</option>
                            <option value="Action" {{ old('genre') == 'Action' ? 'selected' : '' }}>Action</option>
                            <option value="Comedy" {{ old('genre') == 'Comedy' ? 'selected' : '' }}>Comedy</option>
                            <option value="Drama" {{ old('genre') == 'Drama' ? 'selected' : '' }}>Drama</option>
                            <option value="Horror" {{ old('genre') == 'Horror' ? 'selected' : '' }}>Horror</option>
                            <option value="Romance" {{ old('genre') == 'Romance' ? 'selected' : '' }}>Romance</option>
                            <option value="Sci-Fi" {{ old('genre') == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                            <option value="Thriller" {{ old('genre') == 'Thriller' ? 'selected' : '' }}>Thriller</option>
                            <option value="Animation" {{ old('genre') == 'Animation' ? 'selected' : '' }}>Animation</option>
                        </select>
                        @error('genre')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">
                            Durasi (menit)
                        </label>
                        <input type="number" id="duration" name="duration" value="{{ old('duration') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('duration') border-red-500 @enderror" 
                               placeholder="120" min="60" max="300">
                        @error('duration')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">
                            Rating
                        </label>
                        <select id="rating" name="rating" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('rating') border-red-500 @enderror">
                            <option value="">Pilih Rating</option>
                            <option value="SU" {{ old('rating') == 'SU' ? 'selected' : '' }}>SU (Semua Umur)</option>
                            <option value="PG" {{ old('rating') == 'PG' ? 'selected' : '' }}>PG (Parental Guidance)</option>
                            <option value="PG-13" {{ old('rating') == 'PG-13' ? 'selected' : '' }}>PG-13</option>
                            <option value="R" {{ old('rating') == 'R' ? 'selected' : '' }}>R (17+)</option>
                        </select>
                        @error('rating')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Informasi Tiket -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Detail Tiket</h3>
                    
                    <div>
                        <label for="studio" class="block text-sm font-medium text-gray-700 mb-1">
                            Studio <span class="text-red-500">*</span>
                        </label>
                        <select id="studio" name="studio" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('studio') border-red-500 @enderror" required>
                            <option value="">Pilih Studio</option>
                            <option value="1" {{ old('studio') == '1' ? 'selected' : '' }}>Studio 1</option>
                            <option value="2" {{ old('studio') == '2' ? 'selected' : '' }}>Studio 2</option>
                            <option value="3" {{ old('studio') == '3' ? 'selected' : '' }}>Studio 3</option>
                            <option value="4" {{ old('studio') == '4' ? 'selected' : '' }}>Studio 4</option>
                            <option value="5" {{ old('studio') == '5' ? 'selected' : '' }}>Studio 5</option>
                        </select>
                        @error('studio')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="seat_number" class="block text-sm font-medium text-gray-700 mb-1">
                            Nomor Kursi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="seat_number" name="seat_number" value="{{ old('seat_number') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('seat_number') border-red-500 @enderror" 
                               placeholder="A1, B5, C10, dll" required>
                        @error('seat_number')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="show_date" class="block text-sm font-medium text-gray-700 mb-1">
                            Tanggal Tayang <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="show_date" name="show_date" value="{{ old('show_date') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('show_date') border-red-500 @enderror" 
                               min="{{ date('Y-m-d') }}" required>
                        @error('show_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="show_time" class="block text-sm font-medium text-gray-700 mb-1">
                            Jam Tayang <span class="text-red-500">*</span>
                        </label>
                        <select id="show_time" name="show_time" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('show_time') border-red-500 @enderror" required>
                            <option value="">Pilih Jam Tayang</option>
                            <option value="10:00" {{ old('show_time') == '10:00' ? 'selected' : '' }}>10:00</option>
                            <option value="12:30" {{ old('show_time') == '12:30' ? 'selected' : '' }}>12:30</option>
                            <option value="15:00" {{ old('show_time') == '15:00' ? 'selected' : '' }}>15:00</option>
                            <option value="17:30" {{ old('show_time') == '17:30' ? 'selected' : '' }}>17:30</option>
                            <option value="20:00" {{ old('show_time') == '20:00' ? 'selected' : '' }}>20:00</option>
                            <option value="22:30" {{ old('show_time') == '22:30' ? 'selected' : '' }}>22:30</option>
                        </select>
                        @error('show_time')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">
                            Harga <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="price" name="price" value="{{ old('price') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 @enderror" 
                               placeholder="50000" min="0" step="1000" required>
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                            Status
                        </label>
                        <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('status') border-red-500 @enderror">
                            <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                            <option value="booked" {{ old('status') == 'booked' ? 'selected' : '' }}>Dipesan</option>
                            <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>Dibayar</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Informasi Pembeli (Opsional) -->
            <div class="mt-6 pt-6 border-t">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Informasi Pembeli (Opsional)</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Pembeli
                        </label>
                        <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('customer_name') border-red-500 @enderror" 
                               placeholder="Nama lengkap">
                        @error('customer_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email
                        </label>
                        <input type="email" id="customer_email" name="customer_email" value="{{ old('customer_email') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('customer_email') border-red-500 @enderror" 
                               placeholder="email@example.com">
                        @error('customer_email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-1">
                            Nomor Telepon
                        </label>
                        <input type="tel" id="customer_phone" name="customer_phone" value="{{ old('customer_phone') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('customer_phone') border-red-500 @enderror" 
                               placeholder="08123456789">
                        @error('customer_phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('tickets.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-300">
                    Batal
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-300">
                    <i class="fas fa-save mr-2"></i>Simpan Tiket
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Auto format harga input
document.getElementById('price').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    e.target.value = value;
});

// Validasi kursi format
document.getElementById('seat_number').addEventListener('input', function(e) {
    let value = e.target.value.toUpperCase();
    // Allow only letter followed by numbers (A1, B12, etc)
    value = value.replace(/[^A-Z0-9]/g, '');
    e.target.value = value;
});
</script>
@endsection