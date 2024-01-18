<?php


namespace App\Http\Controllers;


use App\Models\FarmSetup;
use App\Models\FarmUnit;
use Illuminate\Http\Request;

class FarmController
{

    function creaefarmindex()
    {
        return view('farm');
    }
    public function store(Request $request)
    {
        // Validation rules, adjust as needed
        $request->validate([
            'farmname' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'unit_name.*' => 'required|string|max:255',
            'unit_description.*' => 'required|string|max:500',
        ]);

        // Create a new farm setup record
        $farmSetup = FarmSetup::create([
            'name' => $request->input('farmname'),
            'contact_number' => $request->input('number'),
        ]);

        // Add farm units
        $units = [];
        $unitNames = $request->input('unit_name');
        $unitDescriptions = $request->input('unit_description');

        foreach ($unitNames as $key => $unitName) {
            $units[] = new FarmUnit([
                'name' => $unitName,
                'description' => $unitDescriptions[$key],
            ]);
        }

        $farmSetup->units()->saveMany($units);

//        return redirect()->route('farm_setup.create')->with('success', 'Farm setup created successfully.');

        return response()->json([
            'status'=>'success',
            'message'=>'Farm setup created successfully',
        ]);
    }

}
