<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Auth;

Route::get('/', fn() => view('welcome'));
Route::get('antrian', fn() => view('antrian'))->name('antrian');
Route::get('resep', fn() => view('dokter/resep'))->name('resep');
Route::get('antrian/pasien', fn() => view('antrian_pasien'))->name('antrian.pasien');
Route::get('jam_operasional', fn() => view('jam_operasional'))->name('jam_operasional');
Route::get('poli', fn() => view('poli'))->name('poli');
Route::get('daftar', fn() => view('daftar'))->name('daftar');

Route::get('jadwal_dokter', [HomeController::class, 'jadwal'])->name('jadwal_dokter');
Auth::routes();

/**
 * User Route List
 */
Route::middleware([
    'auth',
    'user-access:user,admin',
])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    Route::get('/profil', [PendaftaranController::class, 'profil'])->name('profil');
    Route::put('/profil/update', [PendaftaranController::class, 'update'])->name('profil.update');
    Route::get('/daftar', [PendaftaranController::class, 'index'])->name('pendaftaran.form');
    Route::post('/daftar', [PendaftaranController::class, 'store'])->name('pendaftaran.submit');
    Route::get('/get-dokter', [PendaftaranController::class, 'getDokterByPoli']);
});

/**
 * Perawat Route List
 */
Route::middleware([
    'auth',
    'user-access:perawat,admin'
])->group(function () {
    Route::get('/perawat/home', [PerawatController::class, 'index'])->name('perawat.home');
    Route::get('/perawat/antrian', [PerawatController::class, 'antrian'])->name('perawat.antrian');
    Route::get('/pendaftar/hari-ini', [PendaftaranController::class, 'countPendaftarHariIni']);
    Route::put('/pendaftar/set_kategori', [PendaftaranController::class, 'setKategori'])->name('perawat.setKategori');
    Route::put('/perawat/pemeriksaan/{id}', [PerawatController::class, 'pemeriksaan'])->name('perawat.pemeriksaan.update');
    Route::post('/perawat/antrian/next', [AntrianController::class, 'next'])->name('perawat.antrian.next');
    Route::post('/perawat/antrian/reset', [AntrianController::class, 'reset'])->name('perawat.antrian.reset');
});

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/admin/rekam-medis', [HomeController::class, 'pasien'])->name('admin.rekam-medis');
    });

/**
 * Dokter Route List
 */
Route::middleware([
    'auth',
    'user-access:dokter,admin',
])->group(function () {
    Route::get('/dokter/home', [DokterController::class, 'home'])->name('dokter.home');
    Route::get('/dokter/antrian', [DokterController::class, 'antrian'])->name('dokter.antrian');
    Route::get('/dokter/pasien', [DokterController::class, 'pasien'])->name('dokter.pasien');
    Route::get('/dokter/selesai/{id}', [DokterController::class, 'selesai'])->name('dokter.pasien.selesai');
    Route::get('/dokter/set_selesai/{pendaftaran}', [DokterController::class, 'setSelesai'])->name('dokter.set_selesai');

    Route::put('/dokter/save_obat', [DokterController::class, 'saveObat'])->name('dokter.save_obat');
    Route::put('/dokter/save_soap', [DokterController::class, 'saveSoap'])->name('dokter.save_soap');
    Route::put('/dokter/save_lab', [DokterController::class, 'saveLab'])->name('dokter.save_lab');
});

/**
 * Admin Route List
 */
Route::middleware(['auth', 'user-access:admin'])
    ->group(function () {
        Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
        Route::resource('obat', ObatController::class);
        Route::resource('dokter', DokterController::class);
    });
