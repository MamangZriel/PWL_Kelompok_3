<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Guest routes (tidak perlu login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Protected routes (perlu login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Movies routes
    Route::resource('movies', MovieController::class);
    
    // Cinemas routes
    Route::resource('cinemas', CinemaController::class);
    
    // Showtimes routes
    Route::resource('showtimes', ShowtimeController::class);
    
    // Tickets routes
    Route::resource('tickets', TicketController::class);
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
    // Home route
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// API routes untuk AJAX
Route::prefix('api')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/book-ticket', [TicketController::class, 'book']);
});

// Root route - redirect berdasarkan status login
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
})->name('root');