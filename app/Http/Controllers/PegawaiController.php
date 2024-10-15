<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all(); // Mengambil semua data pegawai
        return view('home.struktur-organisasi', compact('pegawais')); // Menyimpan data pegawai ke view
    }
};
