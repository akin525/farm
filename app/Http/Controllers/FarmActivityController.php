<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\FarmActivity;
use App\Models\FarmUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmActivityController extends Controller
{
    //
    public function index()
    {
        $farmActivities = FarmActivity::where('company_code', Auth::user()->company_code)->with(['farmUnit', 'employee'])->get();
        $farmUnits = FarmUnit::where('company_code', Auth::user()->company_code)->get();;
        $employees = Employee::where('company_code', Auth::user()->company_code)->get();;
        return view('farm_activities.index', compact('farmActivities', 'farmUnits', 'employees'));
    }

    public function create()
    {
        $farmUnits = FarmUnit::where('company_code', Auth::user()->company_code)->get();;
        $employees = Employee::where('company_code', Auth::user()->company_code)->get();;
        return view('farm_activities.create', compact('farmUnits', 'employees'));
    }

    public function store(Request $request)
    {
        // Validation rules, adjust as needed
        $request->validate([
            'farm_unit_id' => 'required|exists:farmunit,id',
            'employee_id' => 'nullable|exists:employees,id',
            'activity_name' => 'required|string|max:255',
        ]);

        // Create a new farm activity record
        FarmActivity::create([
            'farm_unit_id' => $request->input('farm_unit_id'),
            'employee_id' => $request->input('employee_id'),
            'activity_name' => $request->input('activity_name'),
            'company_code'=>Auth::user()->company_code,
        ]);

//        return redirect()->route('farm_activities.index')->with('success', 'Farm activity created successfully.');
        return response()->json([
            'status'=>'success',
            'message'=>'Farm activity created successfully.',
        ]);
    }

    public function show($id)
    {
        $farmActivity = FarmActivity::where('company_code', Auth::user()->company_code)->with(['farmUnit', 'employee'])->find($id);
        return view('farm_activities.show', compact('farmActivity'));
    }
}
