<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DokumenPublikController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\VisiMisiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'show'])->name('beranda');
Route::get('/visi-misi', [VisiMisiController::class, 'show'])->name('visi-misi');
Route::get('/struktur-organisasi', [StrukturOrganisasiController::class, 'show'])->name('struktur-organisasi');

// Dokumen Publik
Route::get('/dokumen-publik', [DokumenPublikController::class, 'index'])->name('dokumen-publik');
Route::get('/dokumen-publik/{slug}', [DokumenPublikController::class, 'show']);

// Artikel alias Berita dan Informasi
Route::view('/artikel-terkini', 'home.artikel-terkini')->name('artikel-terkini');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show']);

Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
Route::get('/informasi/{slug}', [InformasiController::class, 'show']);

// Semua rute yang ada hubungannya dengan admin harus di dalam sini
Route::prefix('admin')->group(function () {
  Route::view('/', 'admin.index')->name('beranda.edit');
  Route::view('/visi-misi', 'admin.visi-misi')->name('visi-misi.edit');
  Route::view('/pegawai', 'admin.pegawai')->name('pegawai.edit');
  Route::view('/struktur-organisasi', 'admin.struktur-organisasi')->name('struktur-organisasi.edit');
  Route::view('/dokumen-publik', 'admin.dokumen-publik')->name('dokumen-publik.edit');
  
  Route::view('/berita', 'admin.berita')->name('berita.admin-index');
  Route::view('/informasi', 'admin.informasi')->name('informasi.admin-index');
});