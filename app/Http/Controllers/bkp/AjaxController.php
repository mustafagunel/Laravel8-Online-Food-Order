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

    function addToCart(Request $request){
        $q = $request->quantity;
        $pID = $request->productId;

        $price = DB::table('product')->select('price','title','restaurant_id')->where('id',$pID)->get(); 
        $data['quantity']=$q;
        $data['price']=round($price[0]->price*$q,2); //round(5.045, 2);
        $data['name']=$price[0]->title;
        $data['restaurant']=$price[0]->restaurant_id;

        //session()->forget('cart');
        
        $cart = $request->session()->get('cart', []);
        
        
        //$first = reset($cart);

        if(reset($cart)){
            foreach ($cart as &$c) {
                if($c['restaurant'] != $data['restaurant']){
                    $ret['error'] = "Farklı restauranttan sipariş vermek için sepeti boşaltmalısın.";
                    return response()->json($ret, 200);
                }else{
                    $cart[$pID] = [
                        "pID"=>$pID,
                        "restaurant" => $data['restaurant'],
                        "quantity" => $data['quantity'],
                        "price" => $data['price'],
                        "name" => $data['name']
                    ];
                }
            }
        }else{
            
            $cart[$pID] = [
                "pID"=>$pID,
                "restaurant" => $data['restaurant'],
                "quantity" => $data['quantity'],
                "price" => $data['price'],
                "name" => $data['name']
            ];
            
        }
        
        $request->session()->put('cart', $cart);

        //return redirect()->back()->with('success', 'Product added to cart successfully!');

        return response()->json($cart, 200);

    }
    
    function getCart(Request $request){

        $cart = $request->session()->get('cart', []);
        //session()->forget('cart');
        return response()->json($cart, 200);

    }

    function removeItem(Request $request){

        $cart = $request->session()->get('cart', []);

        if(isset($cart[$request->id])){
            unset($cart[$request->id]);
            $request->session()->put('cart', $cart);
        }else{
            $cart['error'] = "Sepette silinecek ürün bulunamadı.";
        }

        return response()->json($cart, 200);

    }

}
