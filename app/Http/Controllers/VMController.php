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
}

