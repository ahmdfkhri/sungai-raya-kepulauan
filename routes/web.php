<?php

use Illuminate\Support\Facades\Route;
use App\Models\VM;
use App\Http\Controllers\VMController;

Route::get('/vm-data', function () {
});

Route::get('/', function () {
  return view('home.index');
})->name('home');

Route::get('/visi-misi', [VMController::class, 'index'])->name('visi-misi');

Route::get('/struktur-organisasi', function () {
  return view('home.struktur-organisasi');
})->name('struktur-organisasi');

Route::get('/dokumen-publik', function () {
  return view('home.dokumen-publik');
})->name('dokumen-publik');

Route::get('/berita-informasi', function () {
  return view('home.berita-informasi');
})->name('berita-informasi');

Route::get('/berita', function () {
  return view('home.berita');
})->name('berita');

Route::get('/informasi', function () {
  return view('home.informasi');
})->name('informasi');