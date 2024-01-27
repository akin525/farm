<?php


namespace App\Http\Controllers;


use App\Models\Payment;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController
{
    public function in(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');


        $data =Payment::where('company_code', Auth::user()->company_code)->orderBy('id', 'desc')->paginate(25);
        $tt = Payment::where('company_code', Auth::user()->company_code)->count();
        $ft = Payment::where('company_code', Auth::user()->company_code)->where([['created_at', 'like', Carbon::now()->format('Y-m-d') . '%']])->count();
        $st = Payment::where([['created_at', 'like', Carbon::now()->subDay()->format('Y-m-d') . '%']])->count();
        $rt = Payment::where([['created_at', 'like', Carbon::now()->subDays(2)->format('Y-m-d') . '%']])->count();
        $amount=Payment::sum('amount');
        $am=Payment::where([['created_at', 'LIKE', '%' . $today . '%']])->sum('amount');
        $am1=Payment::where([['created_at', 'like', '%'. Carbon::now()->subDay()->format('y-m-d'). '%']])->sum('amount');
        $am2=Payment::where([['created_at', 'like', '%'. Carbon::now()->subDays(2)->format('y-m-d'). '%']])->sum('amount');


        return view('payment', ['data' => $data,'amount'=>$amount, 'am'=>$am, 'am1'=>$am1, 'am2'=>$am2,  'tt' => $tt, 'ft' => $ft, 'st' => $st, 'rt' => $rt]);

    }
    public function bill()
    {
        $today = Carbon::now()->format('Y-m-d');


        $data =Purchase::where('company_code', Auth::user()->company_code)->orderBy('id', 'desc')->paginate(25);
        $tt = Purchase::count();
        $ft = Purchase::where([['purchase_date', 'like', Carbon::now()->format('Y-m-d') . '%']])->count();
        $st = Purchase::where([['purchase_date', 'like', Carbon::now()->subDay()->format('Y-m-d') . '%']])->count();
        $rt = Purchase::where([['purchase_date', 'like', Carbon::now()->subDays(2)->format('Y-m-d') . '%']])->count();
        $amount=Purchase::sum('unit_price');
        $am=Purchase::where([['purchase_date', 'LIKE', '%' . $today . '%']])->sum('unit_price');
        $am1=Purchase::where([['purchase_date', 'like', '%'. Carbon::now()->subDay()->format('y-m-d'). '%']])->sum('unit_price');
        $am2=Purchase::where([['purchase_date', 'like', '%'. Carbon::now()->subDays(2)->format('y-m-d'). '%']])->sum('unit_price');

        return view('purchase', ['data' => $data,'amount'=>$amount, 'am'=>$am, 'am1'=>$am1, 'am2'=>$am2,  'tt' => $tt, 'ft' => $ft, 'st' => $st, 'rt' => $rt]);

    }
}
