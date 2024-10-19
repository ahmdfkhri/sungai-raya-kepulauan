<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'newest');

        $query = Article::berita()->whereNotNull('published_at');

        if ($search) {
            $query->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($search) . '%']);
        }

        switch ($sort) {
            case 'most_viewed':
                $query->orderBy('views', 'desc'); // Views paling banyak
                break;
            case 'least_viewed':
                $query->orderBy('views', 'asc'); // Views paling sedikit
                break;
            case 'oldest':
                $query->orderBy('published_at', 'asc'); // Published_at terlama
                break;
            default:
                $query->orderBy('published_at', 'desc'); // Default: published_at terbaru
                break;
        }

        $berita = $query->with('firstContent')->paginate(12)->onEachSide(2);
        return view('home.berita', compact('berita'));
    }

    public function show($slug) {
        $article = Article::berita()->where('slug', $slug)->with('contents')->firstOrFail();
        return view('home.artikel-show', compact('article'));
    }
}
