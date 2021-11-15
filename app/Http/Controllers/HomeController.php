<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index($city){
        return view('Home.index',['city'=>$city]);
    }
    public function index2($city,$town){
        return view('Home.index',['city'=>$city,'town'=>$town]);
    }
}
