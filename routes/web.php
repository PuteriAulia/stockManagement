<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangReturController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Dashboard
Route::get('/', [DashboardController::class, 'index']);

// Auth
Route::get('/register', [AuthController::class, 'formRegister']);
Route::post('/register-proses', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login']);

// Barang
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang-tambah', [BarangController::class, 'formTambah']);
Route::post('/barang', [BarangController::class, 'tambah']);
Route::get('/barang-edit/{id}', [BarangController::class, 'formEdit']);
Route::put('/barang/{id}', [BarangController::class, 'edit']);
Route::get('/barang-hapus/{id}', [BarangController::class, 'konfirmHapus']);
Route::delete('/barang-hapus/{id}', [BarangController::class, 'hapus']);

// Barang masuk
Route::get('/barangMasuk', [BarangMasukController::class, 'index']);
Route::get('/barangMasuk-tambah', [BarangMasukController::class, 'formTambah']);
Route::post('/barangMasuk', [BarangMasukController::class, 'tambah']);
Route::get('/barangMasuk-hapus/{id}', [BarangMasukController::class, 'konfirmHapus']);
Route::delete('/barangMasuk-hapus/{id}', [BarangMasukController::class, 'hapus']);

// Barang retur
Route::get('/barangRetur', [BarangReturController::class, 'index']);
Route::get('/barangRetur-tambah', [BarangReturController::class, 'formTambah']);
Route::post('/barangRetur', [BarangReturController::class, 'tambah']);
Route::get('/barangRetur-hapus/{id}', [BarangReturController::class, 'konfirmHapus']);
Route::delete('/barangRetur-hapus/{id}', [BarangReturController::class, 'hapus']);

// Suplier
Route::get('/suplier', [SuplierController::class, 'index']);
Route::get('/suplier-tambah', [SuplierController::class, 'formTambah']);
Route::post('/suplier', [SuplierController::class, 'tambah']);
Route::get('/suplier-edit/{id}', [SuplierController::class, 'formEdit']);
Route::put('/suplier/{id}', [SuplierController::class, 'edit']);
Route::get('/suplier-hapus/{id}', [SuplierController::class, 'konfirmHapus']);
Route::delete('/suplier-hapus/{id}', [SuplierController::class, 'hapus']);

//Kasir
Route::get('/kasir', [KasirController::class, 'index']);
Route::post('/kasir-tambah-cart', [KasirController::class, 'tambahCart']);
Route::delete('/kasir-hapus-cart/{id}', [KasirController::class, 'hapus']);
Route::post('/kasir-pembayaran', [KasirController::class, 'pembayaran']);
Route::post('/kasir-simpan', [KasirController::class, 'simpan']);