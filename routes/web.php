<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return redirect()->route('movies.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Movies routes
Route::resource('movies', MovieController::class);

// Cinemas routes
Route::resource('cinemas', CinemaController::class);

// Showtimes routes
Route::resource('showtimes', ShowtimeController::class);

// Tickets routes
Route::resource('tickets', TicketController::class);