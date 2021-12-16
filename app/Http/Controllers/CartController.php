<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\DB;

use App\Models\Product;

class CartController extends Controller
{
    
    function getCart(){
        $cart = session()->get('cart', []);
        $_total=0;
        foreach($cart as $c){
            $_total = $_total + $c['quantity']*$c['price'];
            $rID = $c['restaurant'];
        }
        $min = DB::table('restaurant')->select('min_cart')->where('id',$rID)->get(); 
        return view('Home.index',['cart'=>$cart,'total'=>$_total,'min'=>$min[0]]);
    }

    function checkOut(Request $request, $type){

        if(!Auth::user()){
            return response()->json("Lütfen Giriş Yapınız", 200);
        }



        $cart = session()->get('cart', []);
        
        $_total=0;
        foreach($cart as $c){
            $_total = $_total + $c['quantity']*$c['price'];
            $rID = $c['restaurant'];
        }

        $min = DB::table('restaurant')->select('min_cart')->where('id',$rID)->first(); 
        

        if( $_total < $min->min_cart){
            $ret = "Minimum sepet tutarını karşılamıyor! ".$min->min_cart-$_total." TL daha ürün eklemeniz gerekmekte.";

            return response()->json($ret, 200);
        }else{
            switch($type){
                case "cash":
                    $this->payment($cart);
                    break;
                case "online-credit-cart":
                    $this->payment($cart);
                    break;
                default:
                    $this->payment($cart);
                    break;
            }
        }
    }


    public function payment($cart){
        $ip= $_SERVER['REMOTE_ADDR'];

        $total=0;
        foreach($cart as $c){
            $p = DB::table('product')->select('price')->where('id',$c['pID'])->get();         
            $total = $total + $p[0]->price*$c['quantity']; 
        }

        DB::table('orders')->insert([
            'user_id'=>Auth::user()->id,
            'restaurant_id'=> $c['restaurant'],
            'total'=> $total,
            'status'=>'status',
            'note'=>'note',
            'ip'=>$ip,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
        ]);

        $newOrder = DB::table('orders')->where('user_id', Auth::User()->id)->orderByRaw('id DESC')->first();

        foreach($cart as $c){

            $product = DB::table('product')->select('price')->where('id',$c['pID'])->first();         
            DB::table('orders_products')->insert([
                'user_id' => Auth::User()->id,
                'product_id' => $c['pID'],
                'order_id' => $newOrder->id,
                'price' => $product->price,
                'amount' => $c['quantity'],
                'total' =>  ($product->price*$c['quantity']),
                'ip' =>  $ip,
                'note' =>  "note",
                'status' =>  "status",
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
            ]);

        }
    }
    
    public function paymentFail(){
        return response()->json("Ödeme alınırken hata oluştu", 200);
    }



}
