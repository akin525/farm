<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
function queryindex()
{
    $sum=Payment::where('company_code', Auth::user()->company_code)->sum('amount');

    return view('paymentreport', compact('sum'));
}
function billdate()
{
    $sum=Purchase::where('company_code', Auth::user()->company_code)->sum('unit_price');

    return view('purchasereport', compact('sum'));
}
function querydeposi(Request $request)
{
    $request->validate([
        'from'=>'required',
        'to'=>'required',
    ]);

    $deposit=DB::table('payments')->where('company_code', Auth::user()->company_code)
        ->whereBetween('created_at', [$request->from, $request->to])->get();
    $sum=Payment::where('company_code', Auth::user()->company_code)->sum('amount');
    $sumdate=DB::table('payments')->where('company_code', Auth::user()->company_code)
        ->whereBetween('created_at', [$request->from, $request->to])->sum('amount');

    return view('paymentreport', ['sum' => $sum, 'sumdate'=>$sumdate, 'deposit'=>$deposit, 'result'=>true]);


}
function querybilldate(Request $request)
{
    $request->validate([
        'from'=>'required',
        'to'=>'required',
    ]);

    $Payment=DB::table('Purchases')->where('company_code', Auth::user()->company_code)
        ->whereBetween('timestamp', [$request->from, $request->to])->get();
    $sum=Purchase::where('company_code', Auth::user()->company_code)->sum('amount');
    $sumdate=DB::table('Purchases')->where('company_code', Auth::user()->company_code)
        ->whereBetween('timestamp', [$request->from, $request->to])->sum('amount');

    return view('purchasereport', ['sum' => $sum, 'sumdate'=>$sumdate, 'Payment'=>$Payment, 'result'=>true]);


}
}
