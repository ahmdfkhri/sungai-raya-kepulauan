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
Route::get('/dokumen-publik', [DokumenPublikController::class, 'show'])->name('dokumen-publik');
Route::view('/artikel-terkini', 'home.artikel-terkini')->name('artikel-terkini');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show']);

Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
Route::get('/informasi/{slug}', [InformasiController::class, 'show']);