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
Route::get('/edit-vm', [VMController::class, 'editVM'])->name('edit.vm');
Route::post('/update-vm/{id}', [VMController::class, 'updateVM'])->name('update.vm');
Route::delete('/delete-vm/{id}', [VMController::class, 'deleteVM'])->name('delete.vm');
Route::post('/add-vm', [VMController::class, 'addVM'])->name('add.vm');


Route::get('/struktur-organisasi',[PegawaiController::class, 'index'])->name('struktur-organisasi');
Route::get('/pegawai', [PegawaiController::class, 'edit'])->name('edit.pegawai');
Route::put('/update-pegawai/{id}', [PegawaiController::class, 'update'])->name('update.pegawai');
Route::delete('/delete-pegawai/{id}', [PegawaiController::class, 'delete'])->name('delete.pegawai');
Route::post('/store-pegawai', [PegawaiController::class, 'add'])->name('store.pegawai');


Route::get('/dokumen-publik',[DokpubController::class, 'index'])->name('dokumen-publik');
Route::get('/dokpub', [DokpubController::class, 'edit'])->name('edit.dokpub');
Route::post('/update-dokpub/{id}', [DokpubController::class, 'update'])->name('update.dokpub');
Route::delete('/delete-dokpub/{id}', [DokpubController::class, 'delete'])->name('delete.dokpub');
Route::post('/store-dokpub', [DokpubController::class, 'add'])->name('store.dokpub');

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