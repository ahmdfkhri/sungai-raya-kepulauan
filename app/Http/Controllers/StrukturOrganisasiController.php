<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrukturOrganisasiController extends Controller
{
    public function show() {
        return view('home.struktur-organisasi');
    }
}
