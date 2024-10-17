<?php

namespace App\Http\Controllers;

use App\Models\Berinf;
use App\Models\Content; // Tambahkan ini
use Illuminate\Http\Request;

class BerinfController extends Controller
{
    public function index()
    {
        $berinfData = Berinf::with('contents')->get();

        return view('home.berita-informasi', compact('berinfData'));
    }

    public function views()
    {
        $berinfData = Berinf::all(); // Mengambil semua data dari tabel berinf
        return view('admin.pages.berita_informasi.view_berinf', compact('berinfData'));
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'views' => 'required|integer',
            'highlight' => 'required|boolean',
        ]);
        
        $berinf = Berinf::findOrFail($id);
        $berinf->update($data);
        
        return redirect()->back()->with('success', 'Data berita dan informasi berhasil diperbarui!'); // Kembali dengan pesan sukses
    }
    
    public function delete($id)
    {
        $berinf = Berinf::findOrFail($id);
        $berinf->delete();
        
        return redirect()->back()->with('success', 'Data berita dan informasi berhasil dihapus!'); // Kembali dengan pesan sukses
    }
    
    public function create($id = null)
    {
        if ($id) {
            $data = Berinf::with('contents')->find($id);
            
            if (!$data) {
                $data = new Berinf();
            }
        } else {
            $data = new Berinf();
        }

        return view('admin.pages.berita_informasi.edit_berinf', compact('data'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'nullable|image|max:2048',
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'views' => 'required|integer',
            'highlight' => 'required|boolean',
            'content_values' => 'nullable|array',
            'content_type' => 'nullable|array',
            'content_order' => 'nullable|array',
        ]);

        if ($request->id) {
            $data = Berinf::find($request->id);
            if ($data) {
                $data->title = $request->title;
                $data->category = $request->category;
                $data->views = $request->views;
                $data->highlight = $request->highlight;

                if ($request->hasFile('thumbnail')) {
                    // Logika untuk menyimpan thumbnail baru
                    $data->thumbnail = $request->file('thumbnail')->store('thumbnails');
                }
                
                $data->save();

                // Update content
                foreach ($request->content_values as $id => $value) {
                    $content = Content::find($id);
                    if ($content) {
                        $content->values = $value;
                        $content->type = $request->content_type[$id];
                        $content->order = $request->content_order[$id];
                        $content->save();
                    }
                }
                return redirect()->route('berinf.create', $data->id)->with('success', 'Data berhasil diperbarui.');
            }
        } else {
            // Tambah data baru
            $data = new Berinf();
            $data->title = $request->title;
            $data->category = $request->category;
            $data->views = $request->views;
            $data->highlight = $request->highlight;

            if ($request->hasFile('thumbnail')) {
                // Logika untuk menyimpan thumbnail baru
                $data->thumbnail = $request->file('thumbnail')->store('thumbnails');
            }

            $data->save();

            // Simpan content
            if ($request->content_values) {
                foreach ($request->content_values as $key => $value) {
                    $content = new Content();
                    $content->values = $value;
                    $content->type = $request->content_type[$key];
                    $content->order = $request->content_order[$key];
                    $content->berinf_id = $data->id; // Pastikan Anda memiliki foreign key ini
                    $content->save();
                }
            }
            
            return redirect()->route('berinf.create')->with('success', 'Data berhasil ditambahkan.');
        }

        return back()->withErrors('Data tidak ditemukan atau gagal disimpan.');
    }
};
