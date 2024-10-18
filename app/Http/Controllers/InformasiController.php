<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index(Request $request) 
    {
        $query = Article::informasi();
        $sort = 'newest';

        if($request->has('search')) {
            $search = $request->input('search');
            $query->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($search) . '%']);
        }

        $informasi = $query->where('published_at', '!=', null)->with('firstContent')->paginate(12)->onEachSide(2);
        return view('home.informasi', compact('informasi'));
    }

    public function show($slug) {
        $berita = Article::informasi()->where('slug', $slug)->with('contents')->firstOrFail();
        return view('home.artikel-show', compact('informasi'));
    }
}
