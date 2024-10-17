<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('home.struktur-organisasi', compact('pegawais'));
    }
    public function edit()
    {
        $pegawaiData = Pegawai::all();
        return view('admin.pages.pegawai', compact('pegawaiData'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_pegawai' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'level' => 'required|in:staff,sekretaris,camat',
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update($data);

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }
    public function delete($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
    public function add(Request $request)
    {
        $data = $request->validate([
            'nama_pegawai' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'level' => 'required|in:staff,sekretaris,camat',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('uploads', 'public'); 
        }

        Pegawai::create($data);

        return redirect()->back()->with('success', 'Data pegawai berhasil ditambahkan!'); 
    }
};
