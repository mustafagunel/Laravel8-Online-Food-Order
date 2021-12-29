<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function index(){

        if(Auth::user()){
            return redirect()->back();
        }else{
            return view('Login.login');
        }
         
    }

    public function authenticate(Request $request)
    {

        if(Auth::user()){
            return redirect()->back();
        }else{
            /*
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);
            */
            $email =$request->email;
            $password =$request->password;
            
            //if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            //if (Auth::attempt($credentials)) {
            if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])){
                $request->session()->regenerate();
                return redirect()->intended('restaurant/istanbul');
            }else{
                return view('Login.error',['error'=>"Giriş başarısız. Hesabın aktif edilmemiş veya giriş bilgilerin yanlış olabilir."]);    
            }

            
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
