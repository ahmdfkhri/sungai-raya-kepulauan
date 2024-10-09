<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home.index');
})->name('home');

Route::get('/visi-misi', function () {
  return view('home.visi-misi');
})->name('visi-misi');

Route::get('/struktur-organisasi', function () {
  return view('home.struktur-organisasi');
})->name('struktur-organisasi');

Route::get('/dokumen-publik', function () {
  return view('home.dokumen-publik');
})->name('dokumen-publik');

Route::get('/berita-informasi', function () {
  return view('home.berita-informasi');
})->name('berita-informasi');