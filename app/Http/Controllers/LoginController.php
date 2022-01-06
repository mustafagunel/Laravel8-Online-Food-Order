<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function index(){ //user
        if(Auth::user()){
            return redirect()->back();
        }else{
            return view('Login.login');
        }
         
    }
    public function index2(){ //admin
        if(Auth::user()){
            return redirect()->back();
        }else{
            return view('Login.login_admin');
        }  
    }

    public function index3(){ //restaurant

        if(Auth::user()){
            return redirect()->back();
        }else{
            return view('Login.login_restaurant');
        }  
    }



    public function authenticate(Request $request) //user login auth
    {

        if(Auth::user()){
            return redirect()->back();
        }else{
            $email =$request->email;
            $password =$request->password;
            
            if (Auth::attempt(['email' => $email, 'password' => $password])){
                if(Auth::user()->role != "user"){
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return view('Login.error',['error'=>"Bu sayfadan yalnızca user hesabı giriş yapabilir."]); 
                }elseif(Auth::user()->status == 0 ){
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return view('Login.error',['error'=>"Hesap henüz aktif edilmemiş. Mailinize gönderilen aktivasyon koduna tıklayarak hesabınızı aktif ediniz."]); 
                }else{
                    $request->session()->regenerate();
                    return redirect()->intended('restaurant/istanbul');
                }
            }else{
                return view('Login.error',['error'=>"Giriş başarısız. Giriş bilgilerinizi kontrol ediniz."]);    
            }           
        }
        
    }

    public function authenticateAdmin(Request $request) //admin login auth
    {
        if(Auth::user()){
            return redirect()->back();
        }else{
            $email =$request->email;
            $password =$request->password;
            
            if (Auth::attempt(['email' => $email, 'password' => $password])){
                if(Auth::user()->role != "admin"){
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return view('Login.error',['error'=>"Bu sayfadan yalnızca admin hesabı giriş yapabilir."]); 
                }elseif(Auth::user()->status == 0 ){
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return view('Login.error',['error'=>"Hesap henüz aktif edilmemiş. Mailinize gönderilen aktivasyon koduna tıklayarak hesabınızı aktif ediniz."]); 
                }else{
                    $request->session()->regenerate();
                    return redirect()->intended('/admin');
                }
            }else{
                return view('Login.error',['error'=>"Giriş başarısız. Giriş bilgilerinizi kontrol ediniz."]);    
            }           
        }
        
    }

    public function authenticateRestaurant(Request $request) //restaurant login auth
    {
        if(Auth::user()){
            return redirect()->back();
        }else{
            $email =$request->email;
            $password =$request->password;
            
            if (Auth::attempt(['email' => $email, 'password' => $password])){
                if(Auth::user()->role != "restaurant"){
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return view('Login.error',['error'=>"Bu sayfadan yalnızca restaurant hesabı giriş yapabilir."]); 
                }elseif(Auth::user()->status == 0 ){
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return view('Login.error',['error'=>"Hesap henüz aktif edilmemiş. Mailinize gönderilen aktivasyon koduna tıklayarak hesabınızı aktif ediniz."]); 
                }else{
                    $request->session()->regenerate();
                    return redirect()->intended('/profile/restaurant');
                }
            }else{
                return view('Login.error',['error'=>"Giriş başarısız. Giriş bilgilerinizi kontrol ediniz."]);    
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
