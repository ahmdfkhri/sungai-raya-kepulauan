<?php

namespace App\Http\Controllers;

use App\Models\PublicDocuments;
use Illuminate\Http\Request;

class DokumenPublikController extends Controller
{
    public function index(Request $request) {
        $query = PublicDocuments::query();

        if ($request->filled('search')) {
            $query->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($request->search) . '%']);
        }

        $sortBy = $request->get('order', 'created_at');
        $sortDirection = $request->get('direction', 'desc');

        if(in_array($sortBy, ['year', 'created_at']) && in_array($sortDirection, ['asc', 'desc'])) {
            $query->orderBy($sortBy, $sortDirection);
        }

        $publicDocuments = $query->paginate(10);
        return view('home.dokumen-publik', compact('publicDocuments'));
    }
}
