<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    function getTown(Request $request){

        $towns = DB::table('town')->where('city_id',$request->city)->get(); 
        
        return response()->json($towns, 200);

    }

}
