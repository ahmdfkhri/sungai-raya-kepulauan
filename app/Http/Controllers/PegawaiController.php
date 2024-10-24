<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function edit()
    {        
        $employees = Employee::query()->orderBy('updated_at', 'desc', 'created_at', 'desc')->paginate(6);
        return view('admin.pegawai', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|max:1024', // Assuming image uploads
        ]);

        $imagePath = $request->file('image')->store('images/employees', 'public');

        Employee::create([
            'name' => $request->name,
            'image' => '/storage//'.$imagePath,
        ]);

        return redirect()->route('pegawai.edit')->with('success', 'Employee added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|max:1024',
        ]);

        $employee = Employee::find($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/employees', 'public');
            $employee->image = '/storage//'.$imagePath;
        }

        $employee->name = $request->name;
        $employee->save();

        return redirect()->route('pegawai.edit')->with('success', 'Employee updated successfully');
    }

    public function delete($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('pegawai.edit')->with('success', 'Employee deleted successfully');
    }
}
