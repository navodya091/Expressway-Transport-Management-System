<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserType;


class LoginController extends Controller
{
    public function loginView()
    {
        try {
            if (!Auth::check())
                return view('auth.login');
            else
                return redirect('/home');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['login' => $e->getMessage()]);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            if (Auth::user()->user_type == UserType::USER_TYPE_OWNER || Auth::user()->user_type == UserType::USER_TYPE_IT_ADMIN ||Auth::user()->user_type == UserType::USER_TYPE_MANAGER ||Auth::user()->user_type == UserType::USER_TYPE_DATA_ENTRY_USER ) {
                return redirect('/home');
            } 
        }

        return back()->withErrors(['login' => 'Invalid login credentials.']);
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
