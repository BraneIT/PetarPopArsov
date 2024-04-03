<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function getLogin(){
        return view('login.login');
    }
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => ['required',],
            'password' => ['required'],
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/admin');
        }
        return back()->withErrors([
            'login' => 'Invalid username or password.',
        ])->withInput($request->only('email'));
    }
    

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
