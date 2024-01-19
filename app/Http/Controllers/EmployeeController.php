<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\FarmUnit;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function create()
    {
        $farmUnits = FarmUnit::all(); // Assuming FarmUnit is your model for farm units
        $employee=Employee::all();
        return view('employees.index', compact('employee', 'farmUnits'));
    }

    public function store(Request $request)
    {
        // Validation rules, adjust as needed
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'salary' => 'nullable|numeric',
            'unit' => 'nullable|string|max:255',
            // Add other fields as needed
        ]);

        Employee::create([
            'name' => $request->input('name'),
            'contact_number' => $request->input('contact_number'),
            'salary' => $request->input('salary'),
            'unit' => $request->input('unit'),
            // Add other fields as needed
        ]);
//        return redirect()->route('employees.create')->with('success', 'Employee created successfully.');
        return response()->json([
            'status'=>'success',
            'message'=>'Employee created successfully.',
        ]);
    }
}
