<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //

    public function index()
    {
        $customers = Customer::where('company_code', Auth::user()->company_code)->get();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        // Validation rules, adjust as needed
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'company_code'=>'required',
        ]);

        Customer::create([
            'name' => $request->input('name'),
            'contact_number' => $request->input('contact_number'),
            'status'=>1,
            'company_code'=>Auth::user()->company_code,
        ]);

//        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
        return response()->json([
            'status'=>"success",
            'message'=>'Customer created successfully',
        ]);
    }
    public function editstore(Request $request)
    {
        // Validation rules, adjust as needed
        $request->validate([
            'id' => 'required',
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
        ]);

        $cus=Customer::where('id', $request->id)->first();
        $cus->name=$request->name;
        $cus->contact_number=$request->contact_number;
        $cus->save();

//        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
        return response()->json([
            'status'=>"success",
            'message'=>'Customer Updated successfully',
        ]);
    }
    public function deletestore(Request $request)
    {
        // Validation rules, adjust as needed
        $request->validate([
            'id' => 'required',
        ]);

        $cus=Customer::where('id', $request->id)->delete();

//        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
        return response()->json([
            'status'=>"success",
            'message'=>'Customer Deleted successfully',
        ]);
    }
}
