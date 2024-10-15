<?php

namespace App\Http\Controllers;

use App\Models\Berinf;
use App\Models\Content; // Tambahkan ini
use Illuminate\Http\Request;

class BerinfController extends Controller
{
    public function index()
    {
        // Mengambil semua data berinf beserta relasinya dengan content
        $berinf = Berinf::with('content')->get();
        // Mengambil semua data content
        $content = Content::all(); // Tambahkan ini

        return view('home.berita-informasi', compact('berinf', 'content')); // Tambahkan $content
    }
};
