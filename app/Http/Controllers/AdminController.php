<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Auth\Middleware\Authenticate;

class AdminController extends Controller
{
    public function index(){
        
        $page="dashboard";
        
        if(Auth::user()){
            if(Auth::user()->role == "admin"){
                return view('Admin.index',['page'=>$page]);
            }
            else{
                return redirect()->intended('unauthenticated');
            }
        }else{
            return redirect()->intended('login');
        }
    }

    public function index2($page){
        if(!isset($page))
            $page="dashboard";

        if(Auth::user()){
            if(Auth::user()->role == "admin"){
                return view('Admin.index',['page'=>$page]);
            }
            else{
                return redirect()->intended('unauthenticated');
            }
        }else{
            return redirect()->intended('login');
        }
    }

}
