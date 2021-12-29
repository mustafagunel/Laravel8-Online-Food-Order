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
        
        if(Auth::user()->id != $UID){
            return redirect()->intended('unauthenticated');
        }
        $q ='SELECT orders.*, restaurant.title as rname, restaurant.town as rtown  FROM orders JOIN restaurant on orders.restaurant_id = restaurant.id where user_id='.Auth::user()->id.' and orders.status="preparing" or orders.status="canceled"';
        $orders = DB::select($q);

        $q2 = 'select * from settings';
        $settings = DB::select($q2);
        return view('Home.Page.userProfile',['orders'=>$orders,'settings'=>$settings[0]]);
    }

}
