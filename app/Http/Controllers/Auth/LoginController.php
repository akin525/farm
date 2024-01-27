<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function customLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'company_code' => 'required',
        ]);

        $credentials = $request->only('username', 'password', 'company_code');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('dashboard')
                ->with('status', 'Welcome back ' . Auth::user()->name);
        }

        return back()
            ->withInput($request->only('username', 'company_code'))
            ->withErrors(['login' => 'Invalid company code, password, or username. Please check your credentials.']);

    }
    public function customLogin22(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'company_code' => 'required',
        ]);

        $user = User::where('email', $request->email)
            ->where('password', Hash::make($request->password))
            ->first();

        return $user;
        if (Auth::user()){
            return redirect()->intended('dashboard')
                ->with('success', 'Welcome back '.$user->name);
        }
        if(!isset($user)){
            return back()->with('error', 'Kindly check your Company code password & username');
        }else {

            Auth::login($user);
//            $admin = 'info@renomobilemoney.com';
            $user = User::where('username', $request->username)->first();

            return redirect()->intended('dashboard')
                ->with('success', 'Welcome back '.$user->name);
        }

    }

}
