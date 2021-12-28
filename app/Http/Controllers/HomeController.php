<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Restaurant;
use Mail;

class HomeController extends Controller
{
    //
    public function index($city){
        
        //$q = 'SELECT * FROM `product` INNER JOIN restaurant ON product.restaurant_id = restaurant.id where city = (SELECT id from city where name="'.$city.'") LIMIT 10';
        $q = 'SELECT product.*, restaurant.id as rid, restaurant.title as rtitle, restaurant.image as rimage, restaurant.description as rdescription FROM `product` product INNER JOIN restaurant ON product.restaurant_id = restaurant.id where city = (SELECT id from city where name="'.$city.'") LIMIT 10';
        $tenProductAndRestaurant = DB::select($q);

        $q2 = 'select * from settings';
        $settings = DB::select($q2);
        
        return view('Home.index',['city'=>$city,'tenProductAndRestaurant'=>$tenProductAndRestaurant,'settings'=>$settings[0]]);
    }
    public function index2($city,$town){
        //$query='select product.*, restaurant.title as restaurant_name from product join restaurant on product.restaurant_id = restaurant.id where restaurant_id IN (SELECT restaurant_id from restaurant where town = (select id from town where name = "'.$town.'")) ';
        $query = 'select * from restaurant where town = (select id from town where name= "'.$town.'") and status="active"';
        $restaurants = DB::select($query);
        
        $q2 = 'select * from settings';
        $settings = DB::select($q2);
        
        return view('Home.index',['city'=>$city,'town'=>$town,'restaurants'=>$restaurants,'settings'=>$settings[0]]);
    }

    public function index3($restaurant_id){
        
        $page="restaurant-detail";
        $query='select restaurant.*, town.name as town_name from restaurant join town on restaurant.town = town.id where restaurant.id = '.$restaurant_id; 
        //$query= 'select * from restaurant where id = '.$restaurant_id;
        $getproducts = 'select product.*, category.title as category_name from product join category on product.category_id = category.id WHERE restaurant_id = '.$restaurant_id.' ORDER BY category_id';
        $getCategories = 'select DISTINCT category.title as category_name from product join category on product.category_id = category.id WHERE restaurant_id = '.$restaurant_id.' ORDER BY category_id';


        $restaurant = DB::select($query);
        $products = DB::select($getproducts);
        $categories = DB::select($getCategories);
        

        $q2 = 'select * from settings';
        $settings = DB::select($q2);

        return view('Home.index',['restaurant'=>$restaurant[0],'products'=>$products,'categories'=>$categories,'settings'=>$settings[0]]);
    }


    function selectRestaurant(){
        $cities = DB::select('select * from city');
        
        return view('Home.countries',['cities'=>$cities]);
    }


    function sss(){
        $q2 = 'select * from settings';
        $settings = DB::select($q2);


        return view ('Home.index',['page'=>'sss','settings'=>$settings[0]]);
    }

    function ksozlesme(){
        $q2 = 'select * from settings';
        $settings = DB::select($q2);

        return view ('Home.index',['page'=>'ksozlesme','settings'=>$settings[0]]);
    }

    function iletisim(){
        $q2 = 'select * from settings';
        $settings = DB::select($q2);

        return view ('Home.index',['page'=>'iletisim','settings'=>$settings[0]]);
    }

    function sendMail(Request $request){

        $email="gunel4755@gmail.com";
        $array = [
            'mail'=>$request->email,
            'msg'=>$request->msg,
            'date'=>date('Y-m-d')
        ];

        mail::send('Home.messagebody',$array, function($message) use ($email){
            $message->subject('YemekDiyarı (WEB)');
            $message->to($email);
        });



        
        $q2 = 'select * from settings';
        $settings = DB::select($q2);    
        return view ('Home.index',['page'=>'iletisim','settings'=>$settings[0],'success'=>"Mail başarılı şekilde gönderildi"]);

    }
}
