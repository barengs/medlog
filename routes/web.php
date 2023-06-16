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

Route::group(['prefix' => 'karyawan'], function () {
    Route::get('semua', [UserProfileController::class, 'index'])->name('karyawan.semua');
    Route::get('lihat/{id}', [UserProfileController::class, 'show'])->name('karyawan.lihat');
    Route::get('tambah', [UserProfileController::class, 'create'])->name('karyawan.tambah');
    Route::post('simpan', [UserProfileController::class, 'store'])->name('karyawan.simpan');
    Route::get('ubah/{id}', [UserProfileController::class, 'edit'])->name('karyawan.ubah');
    Route::put('ganti/{id}', [UserProfileController::class, 'update'])->name('karyawan.ganti');
    Route::delete('hapus/{id}', [UserProfileController::class, 'destroy'])->name('karyawan.hapus');
});

Route::group(['prefix' => 'jabatan'], function () {
    Route::get('semua', [PositionController::class, 'index'])->name('jabatan.semua');
    Route::get('tambah', [PositionController::class, 'create'])->name('jabatan.tambah');
    Route::post('simpan', [PositionController::class, 'store'])->name('jabatan.simpan');
    Route::get('ubah/{id}', [PositionController::class, 'edit'])->name('jabatan.ubah');
    Route::put('ganti/{id}', [PositionController::class, 'update'])->name('jabatan.ganti');
    Route::delete('hapus/{id}', [PositionController::class, 'destroy'])->name('jabatan.hapus');
});

Route::group(['prefix' => 'obat'], function () {
    Route::get('semua', [ObatController::class, 'index'])->name('obat.semua');
    Route::get('lihat/{id}', [ObatController::class, 'show'])->name('obat.lihat');
    Route::get('tambah', [ObatController::class, 'create'])->name('obat.tambah');
    Route::post('simpan', [ObatController::class, 'store'])->name('obat.simpan');
    Route::get('ubah/{id}', [ObatController::class, 'edit'])->name('obat.ubah');
    Route::put('ubah/{id}/ganti', [ObatController::class, 'update'])->name('obat.ganti');
    Route::delete('hapus/{id}', [ObatController::class, 'destroy'])->name('obat.hapus');
});

Route::group(['prefix' => 'kategori-obat'], function () {
    Route::get('semua', [KategoriObatController::class, 'index'])->name('kategori.semua');
    Route::get('tambah', [KategoriObatController::class, 'create'])->name('kategori.tambah');
    Route::post('simpan', [KategoriObatController::class, 'store'])->name('kategori.simpan');
    Route::get('ubah/{id}', [KategoriObatController::class, 'edit'])->name('kategori.ubah');
    Route::put('ubah/{id}/ganti', [KategoriObatController::class, 'update'])->name('kategori.ganti');
    Route::delete('hapus/{id}', [KategoriObatController::class, 'destroy'])->name('kategori.hapus');
});

Route::group(['prefix' => 'pasien'], function () {
    Route::get('semua', [PasienController::class, 'index'])->name('pasien.semua');
    Route::get('lihat/{id}', [PasienController::class, 'show'])->name('pasien.lihat');
    Route::get('tambah', [PasienController::class, 'create'])->name('pasien.tambah');
    Route::post('simpan', [PasienController::class, 'store'])->name('pasien.simpan');
    Route::get('ubah/{id}', [PasienController::class, 'edit'])->name('pasien.ubah');
    Route::put('ganti/{id}', [PasienController::class, 'update'])->name('pasien.ganti');
    Route::delete('hapus/{id}', [PasienController::class, 'destroy'])->name('pasien.hapus');
    Route::get('{id}/cari', [PasienController::class, 'cari'])->name('pasien.cari');
});

Route::group(['prefix' => 'checkup'], function () {
    Route::get('semua', [CheckupController::class, 'index'])->name('checkup.semua');
    Route::get('lihat/{id}', [CheckupController::class, 'show'])->name('checkup.lihat');
    Route::get('tambah', [CheckupController::class, 'create'])->name('checkup.tambah');
    Route::post('simpan', [CheckupController::class, 'store'])->name('checkup.simpan');
    Route::get('ubah/{id}', [CheckupController::class, 'edit'])->name('checkup.ubah');
    Route::put('ganti/{id}', [CheckupController::class, 'update'])->name('checkup.ganti');
    Route::delete('hapus/{id}', [CheckupController::class, 'destroy'])->name('checkup.hapus');
});

Route::group(['prefix' => 'periksa'], function () {
    Route::get('semua', [CheckupController::class, 'list'])->name('periksa.semua');
    Route::get('proses/{id}', [CheckupController::class, 'edit'])->name('periksa.proses');
});
