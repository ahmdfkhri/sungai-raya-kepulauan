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
    
    public function editVM()
    {
        $vmData = VM::all(); // Mengambil semua data dari tabel VM
        return view('admin.pages.visi&misi.edit-v&m', compact('vmData'));
    }

    public function updateVM(Request $request, $id)
    {
        $data = $request->validate([
            'tipe' => 'required|in:visi,misi',
            'desc' => 'required|string',
        ]);

        // Temukan dan perbarui data
        $vm = VM::findOrFail($id);
        $vm->tipe = $data['tipe'];
        $vm->desc = $data['desc'];
        $vm->save();

        return response()->json(['success' => true]);
    }

    public function deleteVM($id)
    {
        $vm = VM::findOrFail($id);
        $vm->delete(); // Hapus data

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function addVM(Request $request)
    {
        $data = $request->validate([
            'tipe' => 'required|in:visi,misi',
            'desc' => 'required|string',
        ]);

        $vm = new VM();
        $vm->tipe = $data['tipe'];
        $vm->desc = $data['desc'];
        $vm->save();

        return response()->json(['success' => true]);
    }

};
