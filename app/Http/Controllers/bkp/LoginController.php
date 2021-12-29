<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){

        if(Auth::user()){
            return redirect()->intended('restaurant/istanbul');
        }else{
            return view('Login.login');
        }
         
    }

    public function authenticate(Request $request)
    {

        if(Auth::user()){
            return redirect()->intended('restaurant/istanbul');
        }else{

            

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);
            
            //if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('restaurant/istanbul');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        
    }

    public function logout(Request $request)
    {
        if(Auth::user()){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->intended('restaurant/istanbul');
        }else{
            return view('Login.login');
        }

        
    }
}
