<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function index($city){
        return view('Home.index',['city'=>$city]);
    }
    public function index2($city,$town){
        //$query='select product.*, restaurant.title as restaurant_name from product join restaurant on product.restaurant_id = restaurant.id where restaurant_id IN (SELECT restaurant_id from restaurant where town = (select id from town where name = "'.$town.'")) ';
        $query = 'select * from restaurant where town = (select id from town where name= "'.$town.'")';
        $restaurants = DB::select($query);
        
        return view('Home.index',['city'=>$city,'town'=>$town,'restaurants'=>$restaurants]);
    }

    public function index3($restaurant_id){
        
        $page="restaurant-detail";
        $query='select restaurant.*, town.name as town_name from restaurant join town on restaurant.town = town.id where restaurant.id = '.$restaurant_id; 
        //$query= 'select * from restaurant where id = '.$restaurant_id;
        $restaurant = DB::select($query);

        return view('Home.index',['restaurant'=>$restaurant[0]]);
    }

}
