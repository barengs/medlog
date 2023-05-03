<?php

use App\Http\Controllers\CheckupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriObatController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'pengguna'], function () {
    Route::get('semua', [UserProfileController::class, 'index'])->name('pengguna.semua');
    Route::get('lihat/{id}', [UserProfileController::class, 'show'])->name('pengguna.lihat');
    Route::get('tambah', [UserProfileController::class, 'create'])->name('pengguna.tambah');
    Route::post('simpan', [UserProfileController::class, 'store'])->name('pengguna.simpan');
    Route::get('ubah/{id}', [UserProfileController::class, 'edit'])->name('pengguna.ubah');
    Route::patch('ganti/{id}', [UserProfileController::class, 'update'])->name('pengguna.ganti');
    Route::delete('hapus/{id}', [UserProfileController::class, 'destroy'])->name('pengguna.hapus');
});

Route::group(['prefix' => 'jabatan'], function () {
    Route::get('semua', [PositionController::class, 'index'])->name('jabatan.semua');
    Route::get('tambah', [PositionController::class, 'create'])->name('jabatan.tambah');
    Route::post('simpan', [PositionController::class, 'store'])->name('jabatan.simpan');
    Route::get('ubah/{id}', [PositionController::class, 'edit'])->name('jabatan.ubah');
    Route::patch('ganti/{id}', [PositionController::class, 'update'])->name('jabatan.ganti');
    Route::delete('hapus/{id}', [PositionController::class, 'destroy'])->name('jabatan.hapus');
});

Route::group(['prefix' => 'obat'], function () {
    Route::get('semua', [ObatController::class, 'index'])->name('obat.semua');
    Route::get('lihat/{id}', [ObatController::class, 'show'])->name('obat.lihat');
    Route::get('tambah', [ObatController::class, 'create'])->name('obat.tambah');
    Route::post('simpan', [ObatController::class, 'store'])->name('obat.simpan');
    Route::get('ubah/{id}', [ObatController::class, 'edit'])->name('obat.ubah');
    Route::patch('ganti/{id}', [ObatController::class, 'update'])->name('obat.ganti');
    Route::delete('hapus/{id}', [ObatController::class, 'destroy'])->name('obat.hapus');
});

Route::group(['prefix' => 'kategori-obat'], function () {
    Route::get('semua', [KategoriObatController::class, 'index'])->name('kategori.semua');
    Route::get('tambah', [KategoriObatController::class, 'create'])->name('kategori.tambah');
    Route::post('simpan', [KategoriObatController::class, 'store'])->name('kategori.simpan');
    Route::get('ubah/{id}', [KategoriObatController::class, 'edit'])->name('kategori.ubah');
    Route::patch('ganti/{id}', [KategoriObatController::class, 'update'])->name('kategori.ganti');
    Route::delete('hapus/{id}', [KategoriObatController::class, 'destroy'])->name('kategori.hapus');
});

Route::group(['prefix' => 'pasien'], function () {
    Route::get('semua', [PasienController::class, 'index'])->name('pasien.semua');
    Route::get('tambah', [PasienController::class, 'create'])->name('pasien.tambah');
    Route::post('simpan', [PasienController::class, 'store'])->name('pasien.simpan');
    Route::get('ubah/{id}', [PasienController::class, 'edit'])->name('pasien.ubah');
    Route::patch('ganti/{id}', [PasienController::class, 'update'])->name('pasien.ganti');
    Route::delete('hapus/{id}', [PasienController::class, 'destroy'])->name('pasien.hapus');
});

Route::group(['prefix' => 'checkup'], function () {
    Route::get('semua', [CheckupController::class, 'index'])->name('checkup.semua');
    Route::get('lihat/{id}', [CheckupController::class, 'show'])->name('checkup.lihat');
    Route::get('tambah', [CheckupController::class, 'create'])->name('checkup.tambah');
    Route::post('simpan', [CheckupController::class, 'store'])->name('checkup.simpan');
    Route::get('ubah/{id}', [CheckupController::class, 'edit'])->name('checkup.ubah');
    Route::patch('ganti/{id}', [CheckupController::class, 'update'])->name('checkup.ganti');
    Route::delete('hapus/{id}', [CheckupController::class, 'destroy'])->name('checkup.hapus');
});
