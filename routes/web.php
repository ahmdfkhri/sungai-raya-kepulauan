<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VMController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DokpubController;
use App\Http\Controllers\BerinfController;

Route::get('/', function () {
  return view('home.index');
})->name('home');

Route::get('/visi-misi', [VMController::class, 'index'])->name('visi-misi');
Route::get('admin/create-v&m', [VMController::class, 'create'])->name('admin.create');
Route::post('admin/create-v&m', [VMController::class, 'store'])->name('admin.store');

Route::get('/struktur-organisasi',[PegawaiController::class, 'index'])->name('struktur-organisasi');

Route::get('/dokumen-publik',[DokpubController::class, 'index'])->name('dokumen-publik');

Route::get('/berita-informasi', [BerinfController::class, 'index'])->name('berita-informasi');

Route::get('/berita', function () {
  return view('home.berita');
})->name('berita');

Route::get('/informasi', function () {
  return view('home.informasi');
})->name('informasi');

Route::get('admin/dashboard', function() {
  return view('admin.admin');
})->name('admin.dashboard');