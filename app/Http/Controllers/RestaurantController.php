<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Auth\Middleware\Authenticate;


use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;

class RestaurantController extends Controller
{
    public function index(){
        
        $page="dashboard";
        
        if(Auth::user()){
            if(Auth::user()->role == "restaurant"){
                return view('Restaurant.index',['page'=>$page]);
            }
            else{
                return redirect()->intended('unauthenticated');
            }
        }else{
            return redirect()->intended('login');
        }
        
    }

    public function index2($page){
        if(!isset($page))
            $page="dashboard";

        if(Auth::user()){
            if(Auth::user()->role == "restaurant"){
                $products = DB::select("SELECT product.* , category.title as category_name FROM  product join category on product.category_id = category.id ");

                return view('Restaurant.index',['page'=>$page,'products'=>$products]);
            }
            else{
                return redirect()->intended('unauthenticated');
            }
        }else{
            return redirect()->intended('login');
        }
    }

    public function index3(){
        
        $page="add-product";

        if(Auth::user()){
            if(Auth::user()->role == "restaurant"){
                $categories = Category::all();

                return view('Restaurant.index',['page'=>$page,'categories'=>$categories]);
            }
            else{
                return redirect()->intended('unauthenticated');
            }
        }else{
            return redirect()->intended('login');
        }
    }



    public function addProduct(Request $request){

        if(Auth::user()){
            if(Auth::user()->role == "restaurant"){
                
                $page="add-product";
                $categories = Category::all();


                $product = new Product;
                $res = $request->validate([

                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
                ]);

                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('images/products'), $imageName);
                $path = $imageName;

                $restaurant_id = Auth::User()->restaurant_id;
                $price = str_replace(',','.',$request->price);



                $product->title= $request->title;
                $product->keywords= $request->keywords;
                $product->description= $request->description;
                $product->image= $path;
                $product->category_id= $request->category;
                $product->restaurant_id= $restaurant_id;
                $product->detail= $request->detail;
                $product->price= $price;  
                $product->status= 1;
                
                $product->save();


                return view('Restaurant.index',['page'=>$page,'categories'=>$categories]);
            }
            else{
                return redirect()->intended('unauthenticated');
            }
        }else{
            return redirect()->intended('login');
        }
    }


}
