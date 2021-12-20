<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Auth\Middleware\Authenticate;


use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function index($UID){
        
        if(! (Auth::user()->id == $UID)){
            return redirect()->intended('unauthenticated');
        }

        return view('User.index');
    }

}
