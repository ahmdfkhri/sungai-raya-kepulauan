<?php

namespace App\Http\Controllers;

use App\Models\VM;
use Illuminate\Http\Request;

class VMController extends Controller
{
    public function index()
    {
        $vmData = VM::all();
        return view('home.visi-misi', ['vmData' => $vmData]); // Pastikan nama view sesuai
    }

    public function create()
    {
        return view('admin.create-v&m');
    }

    // Fungsi untuk menyimpan data baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tipe' => 'required|in:visi,misi',
            'desc' => 'required|string',
        ]);

        // Simpan data ke dalam tabel v&m
        VM::create([
            'tipe' => $request->tipe,
            'desc' => $request->desc,
        ]);

        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('admin.create')->with('success', 'Data visi & misi berhasil disimpan!');
    }
};
