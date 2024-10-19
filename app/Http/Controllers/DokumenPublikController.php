<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokumenPublikController extends Controller
{
    public function index() {
        return view('home.dokumen-publik');
    }

    public function show($slug) {
        
        return view('home.dokumen-publik-show');
    }
}
