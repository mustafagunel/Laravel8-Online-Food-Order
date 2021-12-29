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
        $q2 = 'select * from settings';
        $settings = DB::select($q2);
        return view('Home.Page.cartHome',['cart'=>$cart,'total'=>$_total,'min'=>$min[0],'settings'=>$settings[0]]);
    }

    function checkOut(Request $request, $type){

        if(!Auth::user()){
            $alert = "Sipariş vermek için giriş yapmak zorundasınız.";
            $cart = session()->get('cart', []);
            $_total=0;
            foreach($cart as $c){
                $_total = $_total + $c['quantity']*$c['price'];
                $rID = $c['restaurant'];
            }
            $min = DB::table('restaurant')->select('min_cart')->where('id',$rID)->get(); 

            $q2 = 'select * from settings';
            $settings = DB::select($q2);
            return view('Home.Page.cartHome',['cart'=>$cart,'total'=>$_total,'min'=>$min[0],'alert'=>$alert,'settings'=>$settings[0]]);
        }

        $cart = session()->get('cart', []);
        
        $_total=0;
        foreach($cart as $c){
            $_total = $_total + $c['quantity']*$c['price'];
            $rID = $c['restaurant'];
        }

        $min = DB::table('restaurant')->select('min_cart')->where('id',$rID)->first(); 
        

        if( $_total < $min->min_cart){
            $alert = "Minimum sepet tutarını karşılamıyor. ".$min->min_cart-$_total." TL daha ürün eklemeniz gerekmekte.";
            $cart = session()->get('cart', []);
            $_total=0;
            foreach($cart as $c){
                $_total = $_total + $c['quantity']*$c['price'];
                $rID = $c['restaurant'];
            }
            $min = DB::table('restaurant')->select('min_cart')->where('id',$rID)->get(); 

            $q2 = 'select * from settings';
            $settings = DB::select($q2);
            return view('Home.Page.cartHome',['cart'=>$cart,'total'=>$_total,'min'=>$min[0],'alert'=>$alert,'settings'=>$settings[0]]);
        }else{
            switch($type){
                case "cash":
                    $t="cash";
                    $this->payment($cart,$t);
                    break;
                case "online-credit-cart":
                    $t="credit-cart";
                    $this->payment($cart,$t);
                    break;
                default:
                    break;
            }
            
            $q2 = 'select * from settings';
            $settings = DB::select($q2);
            return view('Home.Page.cartHome',['success'=>"Ödeme işlemi başarılı şekilde gerçekleştirildi.",'settings'=>$settings[0]]);
        }

    }


    public function payment($cart,$t){
        $ip= $_SERVER['REMOTE_ADDR'];

        $total=0;
        foreach($cart as $c){
            $p = DB::table('product')->select('price')->where('id',$c['pID'])->get();         
            $total = $total + $p[0]->price*$c['quantity']; 
        }

        // Yeni sipariş oluşturulması
        DB::table('orders')->insert([
            'user_id'=>Auth::user()->id,
            'restaurant_id'=> $c['restaurant'],
            'total'=> $total,
            'note'=>'note',
            'payment_type'=>$t,
            'ip'=>$ip,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
        ]);

        $newOrder = DB::table('orders')->where('user_id', Auth::User()->id)->orderByRaw('id DESC')->first();

        // Siparişe ait ürünlerin tabloya eklenmesi
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

        
        $cart = session()->forget('cart');

    }
    
    public function paymentFail(){
        $q2 = 'select * from settings';
        $settings = DB::select($q2);
        return view('Home.Page.cartHome',['cart'=>$cart,'total'=>$_total,'min'=>$min[0],'alert'=>$alert,'settings'=>$settings[0]]);
    }



}
