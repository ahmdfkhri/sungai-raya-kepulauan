<?php

namespace App\Http\Controllers;

use App\Models\VisionAndMission;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function show() {
        $visionMission = VisionAndMission::query()->orderBy('id', 'asc')->get();
        return view('home.visi-misi', compact('visionMission'));
    }

    public function edit() {
        $visions = VisionAndMission::where('type', 'vision')->first();
        $missions = VisionAndMission::where('type', 'mission')->get();
        return view('admin.visi-misi', compact('visions', 'missions'));
    }

    public function update(Request $request) {
        // Update vision
        if ($request->has('vision')) {
            $vision = VisionAndMission::where('type', 'vision')->first();
            $vision->value = $request->input('vision');
            $vision->save();
        }

        // Update missions if any
        if ($request->has('missions')) {
            foreach ($request->input('missions') as $missionData) {
                $mission = VisionAndMission::find($missionData['id']);
                $mission->value = $missionData['value'];
                $mission->save();
            }
        }

        return redirect()->back()->with('success', 'Data updated successfully');
    }

    public function delete($id) {
        $mission = VisionAndMission::find($id);
        $mission->delete();

        return redirect()->back()->with('success', 'Mission deleted successfully');
    }

    public function add(Request $request) {
        VisionAndMission::create([
            'type' => 'mission',
            'value' => $request->input('value'),
            'order' => $request->input('order'),
        ]);

        return redirect()->back()->with('success', 'Mission added successfully');
    }
}
