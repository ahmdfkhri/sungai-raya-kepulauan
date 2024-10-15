<?php

namespace App\Http\Controllers;

use App\Models\Dokpub;
use Illuminate\Http\Request;

class DokpubController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel dokpub
        $dokpubs = Dokpub::all();

        // Kirim data ke view
        return view('home.dokumen-publik', compact('dokpubs'));
    }
};
