<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){

        return view('Login.index',['name'=>'Mustafa ','surname'=>'Günel']); 
    }

    public function test($name){
    
        return view('Login.index',['name'=>$name]);
    }

    
}
