<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PlottingController;
use App\Http\Controllers\TukController;
use App\Http\Controllers\ProfileController;

// ============================================================
// Auth Routes — mendaftarkan: /login, /register, /logout, dll
// ============================================================
Auth::routes();

// ============================================================
// Routes yang butuh login (auth middleware)
// ============================================================
Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        $totalAsesor   = \App\Models\Asesor::count();
        $totalPeserta  = \App\Models\Peserta::count();
        $totalPlotting = \App\Models\Plotting::count();
        $totalTuk      = \App\Models\Tuk::count();
        return view('dashboard', compact('totalAsesor', 'totalPeserta', 'totalPlotting', 'totalTuk'));
    })->name('home');

    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');

    Route::resource('asesor',   AsesorController::class);
    Route::resource('peserta',  PesertaController::class);
    Route::resource('plotting', PlottingController::class);
    Route::resource('tuk',      TukController::class);

    // ============================================================
    // Profile Routes
    // ============================================================
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});
