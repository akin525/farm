<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use function Termwind\ValueObjects\p;

class SaleController extends Controller
{
    public function create()
    {
        $in=Inventory::where('company_code', Auth::user()->company_code)->get();;
        return view('create', compact('in')); // You need to create this view for the form
    }

    public function store(Request $request)
    {
        // Validation rules, adjust as needed
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'sale_date' => 'required|date',
        ]);
        $productname = $request->input('product_name');

        $in=Inventory::where('id', $productname)->first();
        $ba=$in->quantity - $request->quantity;
        Sale::create([
            'product_name' => $in->product_name,
            'quantity' => $request->input('quantity'),
            'unit_price' => $request->input('unit_price'),
            'sale_date' => $request->input('sale_date'),
            'company'=>Auth::user()->company_code,
        ]);


        $in->quantity=$ba;
        $in->save();

//        return redirect()->route('createsales')->with('success', 'Sale recorded successfully.');
        return response()->json([
            "status"=>"success",
            "message"=>"Sale recorded successfully",
        ]);
    }

    // Add other methods as needed (index, show, edit, update, delete)

    function allsales()
    {
        $data=Sale::all();

        return view('allsale', compact('data'));
    }
}
