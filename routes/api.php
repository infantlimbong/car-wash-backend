<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\RegisterController;

// Api route untuk login
Route::post('/login', [LoginController::class, 'login']);

// Api route untuk mendaftarkan user baru
Route::post('/register', [RegisterController::class, 'register']);

// Api routes yang dilindungi dengan Sanctum Authentication
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']); //untuk menampilkan data users
    Route::post('/users', [UserController::class, 'store']); // untuk menambahkan user
    Route::get('/users/{user}', [UserController::class, 'show']); // untuk menampilkan data user yang dipilih
    Route::put('/users/{user}', [UserController::class, 'update']); // untuk mengubah data user yang dipilih
    Route::get('/user', [UserController::class, 'authenticatedUser']); // untuk menampilkan data user yang login
    Route::delete('/users/{user}', [UserController::class, 'destroy']); // untuk menghapus data user

    Route::apiResource('mobils', MobilController::class); //Api resource untuk tabel mobil
    Route::apiResource('permintaans', PermintaanController::class); //Api resource untuk tabel permintaan
    Route::apiResource('pembayarans', PembayaranController::class); //Api resource untuk tabel pembayaran
    Route::apiResource('layanans', LayananController::class); //Api resource untuk tabel layanan

    // Api route untuk login
    Route::post('/logout', [LoginController::class, 'logout']);
});
