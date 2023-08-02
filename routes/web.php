<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\CheckupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GlobalDataConroller;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\KategoriObatController;
use App\Http\Controllers\PasienFrontController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route::get('/', function () {
//     return view('layouts.auth-login');
// });

Route::get('/', [PasienFrontController::class, 'index'])->name('landingpage');

Route::group(['prefix' => 'user'], function() {
    Route::get('login', function() { return view('landing.login'); })->name('user.login');
    Route::get('register', [PasienFrontController::class, 'create'])->name('user.register');
    Route::get('register/store', [PasienFrontController::class, 'store'])->name('user.store');
    Route::get('antrian', [PasienFrontController::class, 'ticket'])->name('user.ticket');
    Route::post('antrian', [PasienFrontController::class, 'antrian'])->name('user.antrian');
    Route::get('profil', [PasienFrontController::class, 'show'])->name('user.profil');
    Route::get('{id}/cari', [PasienController::class, 'cari'])->name('user.cari');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('profile', [UserController::class, 'index'])->name('user.index');
    Route::get('profile/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('profile/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('profile/{id}/reset', [UserController::class, 'reset'])->name('pass.reset');
    Route::put('profile/{id}', [UserController::class, 'passtore'])->name('pass.store');

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
        Route::get('semua', [RoleController::class, 'index'])->name('jabatan.semua');
        Route::get('tambah', [RoleController::class, 'create'])->name('jabatan.tambah');
        Route::post('simpan', [RoleController::class, 'store'])->name('jabatan.simpan');
        Route::get('ubah/{id}', [RoleController::class, 'edit'])->name('jabatan.ubah');
        Route::put('ganti/{id}', [RoleController::class, 'update'])->name('jabatan.ganti');
        Route::delete('hapus/{id}', [RoleController::class, 'destroy'])->name('jabatan.hapus');
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
        Route::get('cetak/{id}', [CheckupController::class, 'resep'])->name('checkup.resep');
    });
    
    Route::group(['prefix' => 'periksa'], function () {
        Route::get('semua', [CheckupController::class, 'list'])->name('periksa.semua');
        Route::get('proses/{id}', [CheckupController::class, 'edit'])->name('periksa.proses');
    });
    
    Route::get('global/total-pasien', [GlobalDataConroller::class, 'pasien'])->name('global.data.pasien');
});

require __DIR__.'/auth.php';
