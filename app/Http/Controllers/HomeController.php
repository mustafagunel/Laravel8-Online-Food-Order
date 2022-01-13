<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Product;
use Mail;

class HomeController extends Controller
{

    function selectRestaurant(){
        $cities = DB::select('select * from city');

        
        $settings[] = $this->getSettings();
        return view('Home.Page.countries',['cities'=>$cities,'settings'=>$settings[0]]);
    }

    public function index($city){
        
        //$q = 'SELECT * FROM `product` INNER JOIN restaurant ON product.restaurant_id = restaurant.id where city = (SELECT id from city where name="'.$city.'") LIMIT 10';
        //$q = 'SELECT product.*, restaurant.id as rid, restaurant.title as rtitle, restaurant.image as rimage, restaurant.description as rdescription FROM `product` product INNER JOIN restaurant ON product.restaurant_id = restaurant.id where city = (SELECT id from city where name="'.$city.'") LIMIT 10';
        $q = 'SELECT product.*, restaurant.id as rid, restaurant.title as rtitle, restaurant.image as rimage, restaurant.description as rdescription, restaurant.point FROM `product` product 
        INNER JOIN restaurant ON product.restaurant_id = restaurant.id 
        where city = (SELECT id from city where name="'.$city.'")
        and product.category_id = (select id from category where title="Menü")
        order by restaurant.point desc
        LIMIT 10';
        $tenProductAndRestaurant = DB::select($q);
        

        $query = 'select * from restaurant where city = (select id from city where name= "'.$city.'") and status="active"';
        $restaurants = DB::select($query);

        $settings[] = $this->getSettings();
        
        return view('Home.Page.cityHome',['city'=>$city,'restaurants'=>$restaurants,'tenProductAndRestaurant'=>$tenProductAndRestaurant,'settings'=>$settings[0]]);
    }

    public function index2($city,$town){
        //$query='select product.*, restaurant.title as restaurant_name from product join restaurant on product.restaurant_id = restaurant.id where restaurant_id IN (SELECT restaurant_id from restaurant where town = (select id from town where name = "'.$town.'")) ';
        $query = 'select * from restaurant where town = (select id from town where name= "'.$town.'") and status="active"';
        $restaurants = DB::select($query);
        
        $settings[] = $this->getSettings();
        
        return view('Home.Page.townHome',['city'=>$city,'town'=>$town,'restaurants'=>$restaurants,'settings'=>$settings[0]]);
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

        return view('Home.Page.restaurantHome',['restaurant'=>$restaurant[0],'products'=>$products,'categories'=>$categories,'settings'=>$settings[0]]);
    }

    
    public function getSettings(){
        $q2 = 'select * from settings';
        $settings = DB::select($q2);
        return $settings[0];
    }

    public function getproductlw(Request $request){
        $search =$request->input('search');

        $count = Product::where('title','like','%'.$search.'%')->get()->count();
        if($count ==1){
            $data = Product::where('title','like','%'.$search.'%')->get()->first();
            return redirect()->route('product',['id'=>$data->id,'title'=>$data->title]);
        }else{
            return redirect()->route('productlist',['search'=>$search]);    
        }
    }

    public function getrestaurantlw(Request $request){
        $search2 =$request->input('search2');

        $count = Restaurant::where('title','like','%'.$search2.'%')->where('town','=',Auth::user()->town)->get()->count();
        if($count ==1){
            $data = Restaurant::where('title','like','%'.$search2.'%')->where('town','=',Auth::user()->town)->get()->first();
            return redirect()->route('restaurant',['id'=>$data->id,'title'=>$data->title]);
        }else{
            return redirect()->route('restaurantlist',['search2'=>$search2]);    
        }
    }

    function sss(){
        $q2 = 'select * from settings';
        $settings = DB::select($q2);

        
        $q = 'select * from settings_2';
        $settings2 = DB::select($q);


        return view ('Home.Page.sss',['page'=>'sss','settings'=>$settings[0],'settings2'=>$settings2]);
    }

    function ksozlesme(){
        $q2 = 'select * from settings';
        $settings = DB::select($q2);

        return view ('Home.Page.ksozlesmesi',['page'=>'ksozlesme','settings'=>$settings[0]]);
    }

    function iletisim(){
        $q2 = 'select * from settings';
        $settings = DB::select($q2);

        return view ('Home.Page.iletisim',['page'=>'iletisim','settings'=>$settings[0]]);
    }

    function sendMail(Request $request){

        $email="gunel4755@gmail.com";
        $array = [
            'mail'=>$request->email,
            'msg'=>$request->msg,
            'date'=>date('Y-m-d')
        ];

        mail::send('Home.Contents.iletisim.messagebody',$array, function($message) use ($email){
            $message->subject('YemekDiyarı (WEB)');
            $message->to($email);
        });
       
        $q2 = 'select * from settings';
        $settings = DB::select($q2);    
        return view ('Home.Page.iletisim',['settings'=>$settings[0],'success'=>"Mesajınız başarılı şekilde iletildi."]);

    }

    //
    /*
    
  


    function selectRestaurant(){
        $cities = DB::select('select * from city');
        
        return view('Home.countries',['cities'=>$cities]);
    }


    

    

    

    
    */
}
