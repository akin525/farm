<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    //
    function allinventory()
    {
        $data=Inventory::all();
        return view('allinventory', compact('data'));
    }
    public function create()
    {
        return view('inventory'); // You need to create this view for the form
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'unit_price' => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
        ]);

        Inventory::create([
            'product_name' => $request->input('product_name'),
            'quantity' => $request->input('quantity'),
            'unit_price' => $request->input('unit_price'),
            'purchase_date' => $request->input('purchase_date'),
        ]);

//        return redirect()->route('inventory/create')->with('success', 'Inventory record created successfully.');
        return response()->json([
            "status"=>"success",
            "message"=>"Inventory Created Successfully",
        ]);
    }
    public function getRemainingQuantity(Request $request)
    {
        $productId = $request->input('id');

        $productDetails = Inventory::find($productId,  ['quantity', 'unit_price']);

        return response()->json($productDetails);
    }

    function updateinventory(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'unit_price' => 'required|numeric|min:0',
        ]);

        $inventory=Inventory::where('id', $request->id)->first();

        $inventory->product_name=$request->product_name;
        $inventory->Quantity=$request->quantity;
        $inventory->unit_price=$request->unit_price;
        $inventory->save();

        return response()->json([
            "status"=>"success",
            "message"=>"Successfully Update",
        ]);


    }

}
