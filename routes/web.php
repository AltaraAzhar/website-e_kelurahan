<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PengajuanController;

// Public Routes
Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Dashboard Route (accessible by all authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Protected User Routes
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
    Route::get('/status', function () {
        return view('status');
    })->name('status');
});

// Protected Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::post('/letters/{id}/process', [AdminDashboardController::class, 'process'])->name('letters.process');
    Route::post('/letters/{id}/complete-document', [AdminDashboardController::class, 'completeWithDocument'])->name('letters.complete-document');
    Route::post('/letters/{id}/complete-eticket', [AdminDashboardController::class, 'completeWithETicket'])->name('letters.complete-eticket');
    Route::post('/letters/{id}/reject', [AdminDashboardController::class, 'reject'])->name('letters.reject');
    Route::post('/letters/{id}/revise', [AdminDashboardController::class, 'revise'])->name('letters.revise');
});
