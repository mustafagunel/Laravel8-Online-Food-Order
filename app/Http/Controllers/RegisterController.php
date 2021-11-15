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
        
        if (Auth::check())
            return view('Pages.home');
        return view('Pages.register');
    }

    public function store(Request $request){
        $user = new User;
        $user->name= "name";
        $user->surname= "surname";
        $user->email= $request->email;
        $user->password= Hash::make($request->password);
        $user->save();
        
        
        return view('Pages.home');
        
    }


}
