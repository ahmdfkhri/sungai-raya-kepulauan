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

    public function edit() {
        $orgCharts = OrgChart::with('employee')->get();
        $employees = Employee::all();
        return view('admin.struktur-organisasi', compact('orgCharts', 'employees'));
    }

    public function store(Request $request) {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'position' => 'required|string|max:255',
            'level' => 'required|integer',
        ]);

        OrgChart::create([
            'employee_id' => $request->employee_id,
            'position' => $request->position,
            'level' => $request->level,
        ]);

        return redirect()->route('struktur-organisasi.edit')->with('success', 'Position added successfully');
    }

    public function update(Request $request, OrgChart $orgChart) {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'position' => 'required|string|max:255',
            'level' => 'required|integer',
        ]);

        $orgChart->update([
            'employee_id' => $request->employee_id,
            'position' => $request->position,
            'level' => $request->level,
        ]);

        return redirect()->route('struktur-organisasi.edit')->with('success', 'Position updated successfully');
    }

    public function delete($id) {
        $orgChart = OrgChart::find($id);
        $orgChart->delete();

        return redirect()->route('struktur-organisasi.edit')->with('success', 'Position deleted successfully');
    }

}
