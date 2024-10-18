<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokumenPublikController extends Controller
{
    public function show() {
        return view('home.dokumen-publik');
    }
}
