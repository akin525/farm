<?php


namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController
{

    public function mydashboard()
    {
        $today = Carbon::now()->format('Y-m-d');
        $todaypayment=Payment::where('company_code', Auth::user()->company_code)
            ->where([['created_at', 'LIKE', '%' . $today . '%']])->sum('amount');
        $todaypaymentnumber=Payment::where('company_code', Auth::user()->company_code)
        ->where([['created_at', 'LIKE', '%' . $today . '%']])->count();
        $payment=Payment::where('company_code', Auth::user()->company_code)->sum('amount');
        $date = Carbon::now()->format("Y-m");
        $thisweek= Payment::where('company_code', Auth::user()->company_code)
            ->where([['created_at', 'LIKE', $date . '%']])->sum('amount');

        $todaypurchase=Purchase::where('company_code', Auth::user()->company_code)->where([['created_at', 'LIKE', '%'.$today.'%']])->sum('unit_price');
        $todaypurchasenumber=Purchase::where('company_code', Auth::user()->company_code)->where([['created_at', 'LIKE', '%'.$today.'%']])->count();
        $allpurchase=Purchase::where('company_code', Auth::user()->company_code)->sum('unit_price');

        $newuser=User::where('company_code', Auth::user()->company_code)->where([['created_at', 'LIKE', '%' . $today . '%']])->count();
        $alluser=User::where('company_code', Auth::user()->company_code)->count();

        $activities=Activity::where('company_code', Auth::user()->company_code)->orderBy('date', 'ASC')->limit(10)->get();
        return view('dashboard', compact('todaypayment', 'todaypaymentnumber', 'payment',
        'thisweek', 'todaypurchase', 'todaypurchasenumber', 'allpurchase', 'newuser', 'alluser', 'activities'
        ));
    }
    public function getTransactions()
    {
        $transactions = Payment::selectRaw('DATE(created_at) as date, SUM(amount) as total_amount')
            ->groupBy('date')
            ->orderBy('date', 'ASC')->limit(10)
            ->get();

        $dates = $transactions->pluck('date')->toArray();
        $amounts = $transactions->pluck('total_amount')->toArray();

        return response()->json([
            'dates' => $dates,
            'amounts' => $amounts,
        ]);
    }
    public function getTransactions1()
    {
        $transactions = Purchase::selectRaw('DATE(created_at) as date, SUM(unit_price) as total_amount')
            ->groupBy('date')
            ->orderBy('date', 'ASC')->limit(10)
            ->get();

        $dates = $transactions->pluck('date')->toArray();
        $amounts = $transactions->pluck('total_amount')->toArray();

        return response()->json([
            'dates' => $dates,
            'amounts' => $amounts,
        ]);
    }
}
