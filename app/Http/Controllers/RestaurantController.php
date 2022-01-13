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
        
        $query = "select SUM(total) as last_month from orders where restaurant_id =".Auth::user()->restaurant_id." and created_at > DATE_ADD( now( ) , INTERVAL -1 MONTH ) ";
        $r = DB::select($query);
        $sales[0]= $r[0];
        $query = "select SUM(total) as last_year from orders where restaurant_id =".Auth::user()->restaurant_id." and created_at > DATE_ADD( now( ) , INTERVAL -1 YEAR ) ";
        $r = DB::select($query);
        $sales[1]= $r[0];
        
        $query = "select SUM(total) as ocak from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 1 and status != 'canceled'";
        $r = DB::select($query);
        $sales[2]['ocak'] = $r[0]->ocak;
        $query = "select SUM(total) as subat from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 2 and status != 'canceled'";
        $r = DB::select($query);
        $sales[2]['subat'] = $r[0]->subat;
        $query = "select SUM(total) as mart from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 3 and status != 'canceled'";
        $r = DB::select($query);
        $sales[2]['mart'] = $r[0]->mart;
        $query = "select SUM(total) as nisan from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 4 and status != 'canceled'";
        $r = DB::select($query);
        $sales[2]['nisan'] = $r[0]->nisan;
        $query = "select SUM(total) as mayis from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 5 and status != 'canceled'";
        $r = DB::select($query);
        $sales[2]['mayis'] = $r[0]->mayis;
        $query = "select SUM(total) as haziran from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 6 and status != 'canceled'";
        $r = DB::select($query);
        $sales[2]['haziran'] = $r[0]->haziran;
        $query = "select SUM(total) as temmuz from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 7 and status != 'canceled'";
        $r = DB::select($query);
        $sales[2]['temmuz'] = $r[0]->temmuz;
        $query = "select SUM(total) as agustos from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 8 and status != 'canceled'" ;
        $r = DB::select($query);
        $sales[2]['agustos'] = $r[0]->agustos;
        $query = "select SUM(total) as eylul from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 9 and status != 'canceled'";
        $r = DB::select($query);
        $sales[2]['eylul'] = $r[0]->eylul;
        $query = "select SUM(total) as ekim from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 10 and status != 'canceled'";
        $r = DB::select($query);
        $sales[2]['ekim'] = $r[0]->ekim;
        $query = "select SUM(total) as kasim from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 11 and status != 'canceled'";
        $r = DB::select($query);
        $sales[2]['kasim'] = $r[0]->kasim;
        $query = "select SUM(total) as aralik from orders where restaurant_id =".Auth::user()->restaurant_id." and MONTH(created_at) = 12 and status != 'canceled'";
        $r = DB::select($query);
        $sales[2]['aralik'] = $r[0]->aralik;
        

        return view('Restaurant.Page.dashboard',['sales'=>$sales]);
        
    }


    public function listProducts(){

        $q = "SELECT product.* , category.title as category_name FROM  product join category on product.category_id = category.id where restaurant_id=".Auth::user()->restaurant_id;
        $products = DB::select($q);

        return view('Restaurant.Page.listProducts',['products'=>$products]);
    }

    public function addProductPage(){
        
        $categories = Category::all();
        return view('Restaurant.Page.addProduct',['categories'=>$categories]);
    }

    public function addProduct(Request $request){
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
            return view('Restaurant.Page.addProduct',['categories'=>$categories,'success'=>"Ürün başarılı bir şekilde eklendi."]);
        else
            return view('Restaurant.Page.addProduct',['categories'=>$categories,'error'=>"Ürün eklenirken bir sorun oluştu!"]);
    }

    function listOrders(){
        $q='SELECT orders.*, users.email as uEmail, users.id as uID 
        FROM orders 
        JOIN users on orders.user_id = users.id
        where orders.restaurant_id='.Auth::user()->restaurant_id.' order by id desc';
        $orders = DB::select($q);
        
        return view('Restaurant.Page.listOrders',['orders'=>$orders]);
    }

    function complateOrder($id){
        $res= DB::table('orders')
            ->where('id', $id)
            ->where('restaurant_id', Auth::user()->restaurant_id)
            ->update(
            [
                'status' => 'complated'
            ]);
        if($res)
            return view('Restaurant.Page.success',['success'=>'Sipariş Tamamlandı']); 
        else
            return view('Restaurant.Page.error',['error'=>'Sipariş tamamlanırken sorun oluştu!']); 
    }

    function cancelOrder($id){
        $res= DB::table('orders')
            ->where('id', $id)
            ->where('restaurant_id', Auth::user()->restaurant_id)
            ->update(
            [
                'status' => 'canceled'
            ]);
            
        if($res)
            return view('Restaurant.Page.success',['success'=>'Sipariş Başarıyla İptal Edildi']); 
        else
            return view('Restaurant.Page.error',['error'=>'Sipariş iptal edilirken sorun oluştu!']); 
    }

    function deleteProduct($id){
        $query = 'DELETE FROM product WHERE id='.$id.' and restaurant_id='.Auth::user()->restaurant_id;
        $res = DB::delete($query);
        if($res)
            return view('Restaurant.Page.success',['success'=>'Sipariş Başarıyla İptal Edildi']); 
        else
            return view('Restaurant.Page.error',['error'=>'Sipariş iptal edilirken sorun oluştu!']); 
    }

    function updateProductPage($id){
        $q = "select * from product where id =".$id.' and restaurant_id = '.Auth::user()->restaurant_id;
        $product = DB::select($q);

        if($product)
            return view('Restaurant.Page.updateProduct',['product'=>$product[0]]); 
        else
            return view('Restaurant.Page.error',['error'=>'Ürün bilgisi çekilirken bir hata oluştu!']); 
    }

    function updateProduct(Request $request){
            
        $res= DB::table('product')
            ->where('id', $request->id)
            ->where('restaurant_id', Auth::user()->restaurant_id)
            ->update(
            [
                'title' => $request->title,
                'keywords' => $request->keywords,
                'description' => $request->description,
                'price' => $request->price,
                'status' => $request->status
            ]);
        
        if($res)
            return view('Restaurant.Page.success',['success'=>"Ürün başarılı şekilde güncellendi."]);
        else
            return view('Restaurant.Page.error',['error'=>"Ürün güncellenirken bir sorun oluştu!"]);
    }

    function getOrderDetail($id){

        
        $q = 'SELECT orders.id as orderID,orders.payment_type,orders.total as orderTotal,orders.note as orderNote, orders.address ,orders_products. *, product.title,product.description, users.name, users.surname,users.email FROM orders 
        JOIN orders_products on orders.id = orders_products.order_id
        JOIN product on orders_products.product_id = product.id
        JOIN users on orders.user_id = users.id
        where orders.id ='.$id;
        $order = DB::select($q);

        return view('Restaurant.Page.orderDetail',['order'=>$order]);
    }


    function setPoint(Request $request){
        
        $q = 'select * from orders where id ='.$request->id;
        $order = DB::select($q);

        if($order[0]->orderPoint == 0){ 
            DB::table('orders')
            ->where('id', $request->id)
            ->update(
            [
                'orderPoint' => $request->points
            ]);
         
            $q = 'select * from restaurant where id ='.$request->rid;
            $r   = DB::select($q);
    
            $newPoint = ($r[0]->point*$r[0]->pointQt + $request->points)/($r[0]->pointQt+1);
    
            DB::table('restaurant')
            ->where('id', $request->rid)
            ->update(
            [
                'point' => $newPoint,
                'pointQt'=> ($r[0]->pointQt+1)
            ]);
        }

        $q2 = 'select * from settings';
        $settings = DB::select($q2);
        return view('Home.Page.userProfile',['success'=>'Siparişinizi başarılı şekilde puanladınız.','settings'=>$settings[0]]);        
        
    }

    public function settings(){
        $q = 'select * from restaurant where id ='.Auth::user()->restaurant_id;
        $settings = DB::select($q);

        return view('Restaurant.Page.settings',['settings'=>$settings[0]]);        
        
    }

    function updateSettings(Request $request){
            
        $res= DB::table('restaurant')
            ->where('id', Auth::user()->restaurant_id)
            ->update(
            [
                'keywords' => $request->keywords,
                'description' => $request->description,
                'min_cart' => $request->min_cart,
                'serve_price' => $request->serve_price,
                'serve_time' => $request->serve_time
            ]);
        
        if($res)
            return view('Restaurant.Page.success',['success'=>"Ayarlar başarılı şekilde güncellendi."]);
        else
            return view('Restaurant.Page.error',['error'=>"Ayarlar güncellenirken bir sorun oluştu!"]);
    }


/*
    

    

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
*/
}
