<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/laporan-excel',
    [LaporanController::class, 'excel']
)->name('laporan.excel');

Route::get('/laporan/pdf', [LaporanController::class, 'pdf'])
    ->name('laporan.pdf');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('admin', AdminController::class);

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // CRUD Laporan
    Route::resource('laporan', LaporanController::class);
    
    Route::get('/map-laporan', [LaporanController::class, 'map'])
    ->name('laporan.map');

    Route::view('/tentang', 'about')->name('about');

    // CRUD Masyarakat
    Route::resource('masyarakat', MasyarakatController::class);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';