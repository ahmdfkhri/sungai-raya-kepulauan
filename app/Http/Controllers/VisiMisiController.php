<?php

namespace App\Http\Controllers;

use App\Models\VisionAndMission;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function show() {
        $visionMission = VisionAndMission::all();
        return view('home.visi-misi', compact('visionMission'));
    }
}
