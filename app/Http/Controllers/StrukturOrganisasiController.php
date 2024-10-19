<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\OrgChart;
use Illuminate\Http\Request;

class StrukturOrganisasiController extends Controller
{
    public function show() {
        $orgCharts = OrgChart::with('employee')->get();
        return view('home.struktur-organisasi', compact('orgCharts'));
    }
}
