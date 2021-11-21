<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function index(){
        
        if(Auth::user()){
            return redirect()->intended('restaurant/istanbul');
        }else{
            return view('Login.register');
        }
    }

    public function store(Request $request){
        
        if(Auth::user()){
            return redirect()->intended('restaurant/istanbul');
        }else{

            $user = new User;
            $user->name= "name";
            $user->surname= "surname";
            $user->email= $request->email;
            $user->password= Hash::make($request->password);
            $user->save();
            
            
            return view('Home.Pages.home');

        }

        
    }


}
