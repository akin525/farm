<?php


namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController
{
function indexuser()
{
    $users=User::where('company_code', Auth::user()->company_code)->paginate('50');
    return view('alluser', compact('users'));
}
    public function profile($username)
    {
        $ap = User::where('username', $username)->first();

        if(!$ap){
            return redirect('inventory')->with('error', 'user does not exist');

        }

        $user =User::where('username', $username)->first();
        $sumtt = Payment::where('username', $ap->username)->sum('amount');
        $tt = Payment::where('username', $ap->username)->count();
        $td = Payment::where('username', $ap->username)->orderBy('id', 'desc')->paginate(10);
        $v = DB::table('purchases')->where('username', $ap->username)->orderBy('id', 'desc')->paginate(25);
        $tat = Purchase::where('username', $ap->username)->count();
        $sumbo = Purchase::where('username', $ap->username)->sum('unit_price');
        $no=Activity::where('username', $ap->username)
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();
//return $user;
        return view('profile', ['no'=>$no, 'user' => $ap, 'sumtt'=>$sumtt,  'sumbo'=>$sumbo, 'tt' => $tt,  'td' => $td,  'version' => $v,  'tat' =>$tat]);
    }

    public function updateuser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'number' => 'required',
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
        ]);
        $users=User::where('username', $request->username)->first();
        $users->name=$request->name;
        $users->address=$request->address;
        $users->gender=$request->gender;
        $users->phone=$request->number;
        $users->email=$request->email;
        $users->role=$request->role;
        $users->save();

        return response()->json(['status'=>'success', 'message'=>'Profile Updated Successfully']);

    }
    public function pass(Request $request)
    {
        $request->validate([
            'username' => 'required',
        ]);
        $users=User::where('username', $request->username)->first();
        $new= uniqid('pass', true);

        $users->password=$new;
        $users->save();
        $admin= 'admin@primedata.com.ng';
        $admin1= 'primedata18@gmail.com';

        $receiver= $users->email;

        return redirect(url('admin/profile/'.$request->username))
            ->with('status', $users->username.' password was change successfully');

    }
}
