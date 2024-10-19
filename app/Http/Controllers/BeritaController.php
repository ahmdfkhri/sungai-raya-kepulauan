<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request) 
    {
        $query = Article::berita();

        if($request->has('search')) {
            $search = $request->input('search');
            $query->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($search) . '%']);
        }

        $berita = $query->where('published_at', '!=', null)->with('firstContent')->paginate(12)->onEachSide(2);
        return view('home.berita', compact('berita'));
    }

    public function show($slug) {
        $article = Article::berita()->where('slug', $slug)->with('contents')->firstOrFail();
        return view('home.artikel-show', compact('article'));
    }
}
