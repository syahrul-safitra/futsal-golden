<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('login');

    }

    public function register()
    {
        return view('register');
    }

    public function logout(Request $request)
    {

        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } else {
            Auth::guard('member')->logout();
        }

        // lalu redirect ke login : 
        return redirect('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:20',
            'password' => 'required|max:10'
        ]);

        if (Auth::guard('user')->attempt($credentials)) {
            return redirect('members');
        }

        if (Auth::guard('member')->attempt($credentials)) {
            return redirect('/');
        }

        return back()->with('errorLogin', 'Login Failed');
    }

}
