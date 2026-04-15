<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuestStarController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\LombaController;
use App\Http\Controllers\Admin\PenampilanController;
use App\Http\Controllers\Admin\PameranController;
use App\Http\Controllers\Admin\FotoKegiatanController;
use App\Http\Controllers\Admin\KontakSponsorshipController;

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Ganti Password
    Route::get('/password', [PasswordController::class, 'showChangeForm'])->name('password.form');
    Route::post('/password', [PasswordController::class, 'update'])->name('password.update');

    // Guest Star
    Route::resource('guest-star', GuestStarController::class)->except(['show']);

    // Sponsor
    Route::resource('sponsor', SponsorController::class)->except(['show']);

    // Lomba
    Route::resource('lomba', LombaController::class)->except(['show']);

    // Penampilan
    Route::resource('penampilan', PenampilanController::class)->except(['show']);

    // Pameran
    Route::resource('pameran', PameranController::class)->except(['show']);

    // Foto Kegiatan
    Route::resource('foto-kegiatan', FotoKegiatanController::class)->except(['show']);

    // Kontak Sponsorship
    Route::resource('kontak-sponsorship', KontakSponsorshipController::class)->except(['show']);
});
