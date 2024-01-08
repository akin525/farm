<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    public function create()
    {
        return view('create'); // You need to create this view for the form
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

        // Create a new sale record
        Sale::create([
            'product_name' => $request->input('product_name'),
            'quantity' => $request->input('quantity'),
            'unit_price' => $request->input('unit_price'),
            'sale_date' => $request->input('sale_date'),
        ]);

        return redirect()->route('createsales')->with('success', 'Sale recorded successfully.');
    }

    // Add other methods as needed (index, show, edit, update, delete)

    function allsales()
    {
        $data=Sale::all();

        return view('allsale', compact('data'));
    }
}
