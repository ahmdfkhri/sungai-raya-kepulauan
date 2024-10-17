<?php

namespace App\Http\Controllers;

use App\Models\Dokpub;
use Illuminate\Http\Request;

class DokpubController extends Controller
{
    public function index()
    {
        $dokpubs = Dokpub::all();
        return view('home.dokumen-publik', compact('dokpubs'));
    }

    public function edit()
    {
        $dokpubData = Dokpub::all(); 
        return view('admin.pages.dokpub', compact('dokpubData'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer|digits:4', 
        ]);

        $dokpub = Dokpub::findOrFail($id); 
        $dokpub->judul = $data['judul'];
        $dokpub->tahun = $data['tahun'];
        $dokpub->save(); 

        return response()->json(['success' => true]);
    }

    public function delete($id)
    {
        $dokpub = Dokpub::findOrFail($id);
        $dokpub->delete(); 

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer|digits:4', 
        ]);

        Dokpub::create($data); 

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }
};
