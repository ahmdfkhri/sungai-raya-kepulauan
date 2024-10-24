<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DokumenPublikController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PegawaiController;
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
  Route::get('/visi-misi', [VisiMisiController::class, 'edit'])->name('visi-misi.edit');
  Route::post('/visi-misi/update', [VisiMisiController::class, 'update'])->name('visi-misi.update');
  Route::post('/visi-misi/add', [VisiMisiController::class, 'add'])->name('visi-misi.add');
  Route::get('/visi-misi/delete/{id}', [VisiMisiController::class, 'delete'])->name('visi-misi.delete');

  Route::get('/pegawai', [PegawaiController::class, 'edit'])->name('pegawai.edit');
  Route::post('/pegawai/add', [PegawaiController::class, 'store'])->name('pegawai.add');
  Route::post('/pegawai/update/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
  Route::post('/pegawai/delete/{id}', [PegawaiController::class, 'delete'])->name('pegawai.delete');

  Route::get('/struktur-organisasi', [StrukturOrganisasiController::class, 'edit'])->name('struktur-organisasi.edit');
  Route::post('/struktur-organisasi', [StrukturOrganisasiController::class, 'store'])->name('struktur-organisasi.store');
  Route::post('/struktur-organisasi/delete/{id}', [StrukturOrganisasiController::class, 'delete'])->name('struktur-organisasi.delete');

  Route::view('/dokumen-publik', 'admin.dokumen-publik')->name('dokumen-publik.edit');
  
  Route::view('/berita', 'admin.berita')->name('berita.admin-index');
  Route::view('/informasi', 'admin.informasi')->name('informasi.admin-index');
});