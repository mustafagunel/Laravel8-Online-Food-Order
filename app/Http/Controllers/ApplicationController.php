<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\DB;
use App\Models\Restaurant;

class ApplicationController extends Controller
{
    function index(){

        $cities = DB::table('city')->get();
        return view('Register.restaurant-apply',['cities'=>$cities]);
    }
    
    function applicationRegister(Request $request){

        $restaurant = new Restaurant;
                $res = $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('images/restaurants-logo'), $imageName);
                $path = $imageName;
                $restaurant->title= $request->title;
                $restaurant->keywords= $request->keywords;
                $restaurant->description= $request->description;
                $restaurant->image= $path;
                $restaurant->city=  $request->city;
                $restaurant->town=  $request->town;
                $res = DB::table('restaurant')->insert([
                    'title' => $request->title,
                    'keywords' => $request->keywords,
                    'description' => $request->description,
                    'image' => $path,
                    'city' => $request->city,
                    'town' =>  $request->town,
                    'status'=>  'pending',
                    'point'=>10,
                    'min_cart'=>$request->mincart,
                    'serve_price'=>$request->serveprice,
                    'serve_time'=>$request->servetime,
                    'ownerID'=> Auth::user()->id,
                    'created_at'=>date("Y-m-d"),
                    'updated_at'=>date("Y-m-d")
                ]);

                $cities = DB::table('city')->get();
                $page="restaurant-add";

                return view('Register.success',['success'=>"Restaurant talebiniz alnmıştır. Onaylandığı taktirde mail gönderilecektir. Talep ettiğiniz kullanıcı ile restaurant'ınızı yönetebilirsiniz."]);
    }
}
