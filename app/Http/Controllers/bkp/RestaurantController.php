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
        $query = "select SUM(total) as last_month from orders where restaurant_id =".Auth::user()->restaurant_id." and created_at > DATE_ADD( now( ) , INTERVAL -1 MONTH ) ";
        $r = DB::select($query);
        $sales[0]= $r[0];
        $query = "select SUM(total) as last_year from orders where restaurant_id =".Auth::user()->restaurant_id." and created_at > DATE_ADD( now( ) , INTERVAL -1 YEAR ) ";
        $r = DB::select($query);
        $sales[1]= $r[0];
        
        $query = "select SUM(total) as ocak from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 1";
        $r = DB::select($query);
        $sales[2]['ocak'] = $r[0]->ocak;
        $query = "select SUM(total) as subat from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 2";
        $r = DB::select($query);
        $sales[2]['subat'] = $r[0]->subat;
        $query = "select SUM(total) as mart from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 3";
        $r = DB::select($query);
        $sales[2]['mart'] = $r[0]->mart;
        $query = "select SUM(total) as nisan from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 4";
        $r = DB::select($query);
        $sales[2]['nisan'] = $r[0]->nisan;
        $query = "select SUM(total) as mayis from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 5";
        $r = DB::select($query);
        $sales[2]['mayis'] = $r[0]->mayis;
        $query = "select SUM(total) as haziran from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 6";
        $r = DB::select($query);
        $sales[2]['haziran'] = $r[0]->haziran;
        $query = "select SUM(total) as temmuz from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 7";
        $r = DB::select($query);
        $sales[2]['temmuz'] = $r[0]->temmuz;
        $query = "select SUM(total) as agustos from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 8";
        $r = DB::select($query);
        $sales[2]['agustos'] = $r[0]->agustos;
        $query = "select SUM(total) as eylul from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 9";
        $r = DB::select($query);
        $sales[2]['eylul'] = $r[0]->eylul;
        $query = "select SUM(total) as ekim from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 10";
        $r = DB::select($query);
        $sales[2]['ekim'] = $r[0]->ekim;
        $query = "select SUM(total) as kasim from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 11";
        $r = DB::select($query);
        $sales[2]['kasim'] = $r[0]->kasim;
        $query = "select SUM(total) as aralik from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 12";
        $r = DB::select($query);
        $sales[2]['aralik'] = $r[0]->aralik;
        

        
        if(Auth::user()){
            if(Auth::user()->role == "restaurant"){
                return view('Restaurant.index',['page'=>$page,'sales'=>$sales]);
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
                $q = "SELECT product.* , category.title as category_name FROM  product join category on product.category_id = category.id where restaurant_id=".Auth::user()->restaurant_id;
                $products = DB::select($q);

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
                $result = $product->save();
                
                if($result)
                    return view('Restaurant.index',['page'=>$page,'categories'=>$categories,'success'=>"Ürün başarılı bir şekilde eklendi."]);
                else
                    return view('Restaurant.index',['page'=>$page,'categories'=>$categories]);
            
            }
            else{
                return redirect()->intended('unauthenticated');
            }
        }else{
            return redirect()->intended('login');
        }
    }

    function deleteProduct($id){
        if(Auth::user()){
            if(Auth::user()->role == "restaurant"){

                $query = 'DELETE FROM product WHERE id='.$id.' and restaurant_id='.Auth::user()->restaurant_id;
                $r = DB::delete($query);
                if($r)
                    return view('Restaurant.index',['success'=>"Ürün başarılı bir şekilde silindi."]);
            }
        }
    }

    function updateProduct($id){
        if(Auth::user()){
            if(Auth::user()->role == "restaurant"){
                $q = "select * from product where id =".$id.' and restaurant_id = '.Auth::user()->restaurant_id;
                $product = DB::select($q);

                if($product)
                    return view('Restaurant.index',['page'=>'edit-product', 'product'=>$product[0]]);
                else
                    return view('Restaurant.index',['error'=>"başarısız"]);
            }
        }
    }

    function updateProduct2(Request $request){
        if(Auth::user()){
            if(Auth::user()->role == "restaurant"){
                
                if($request->status == 1)
                    $s = 1;
                else
                    $s = 0;
                    
                $res= DB::table('product')
                    ->where('id', $request->id)
                    ->where('restaurant_id', Auth::user()->restaurant_id)
                    ->update(
                    [
                        'title' => $request->title,
                        'keywords' => $request->keywords,
                        'description' => $request->description,
                        'price' => $request->price,
                        'status' => $s
                    ]);
                
                if($res)
                    return view('Restaurant.index',['success'=>"Ürün başarılı şekilde güncellendi."]);
                else
                    return view('Restaurant.index',['error'=>"başarısız"]);
            }
        }
    }

    function listOrders(){
        if(Auth::user()){
            if(Auth::user()->role == "restaurant"){
                $q='SELECT orders.*, users.email as uEmail, users.id as uID 
                FROM orders 
                JOIN users on orders.user_id = users.id
                where orders.restaurant_id='.Auth::user()->restaurant_id.' order by id desc';
                $orders = DB::select($q);
                
                return view('Restaurant.index',['page'=>'list-orders','orders'=>$orders]);        
            }else{
                return view('unauthenticated');
            }
        }else{
            return view('unauthenticated');
        }
    }

    function complateOrder($id){
        if(Auth::user()){
            if(Auth::user()->role == "restaurant"){
                
                $res= DB::table('orders')
                    ->where('id', $id)
                    ->where('restaurant_id', Auth::user()->restaurant_id)
                    ->update(
                    [
                        'status' => 'complated'
                    ]);
                    
                return view('Restaurant.index',['success'=>'Sipariş Tamamlandı']);        
            }else{
                return view('unauthenticated');
            }
        }else{
            return view('unauthenticated');
        }
    }
    function cancelOrder($id){
        if(Auth::user()){
            if(Auth::user()->role == "restaurant"){
                
                $res= DB::table('orders')
                    ->where('id', $id)
                    ->where('restaurant_id', Auth::user()->restaurant_id)
                    ->update(
                    [
                        'status' => 'canceled'
                    ]);
                    
                return view('Restaurant.index',['success'=>'Sipariş İptal Edildi']);        
            }else{
                return view('unauthenticated');
            }
        }else{
            return view('unauthenticated');
        }
    }

    function getOrderDetail($id){
        $q = 'SELECT orders.*, product.title as pName, users.email as uEmail, 
        orders_products.id as opID, product.id as pID, users.id as uID 
        FROM orders 
        JOIN orders_products on orders.id = orders_products.order_id
        JOIN product on orders_products.product_id = product.id
        JOIN users on orders.user_id = users.id
        where orders.restaurant_id='.Auth::user()->restaurant_id.' and orders.id='.$id;
        $order_details = DB::select($q);


    }

}
