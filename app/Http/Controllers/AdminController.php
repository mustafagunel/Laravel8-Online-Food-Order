<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use App\Models\Restaurant;

class AdminController extends Controller
{
    public function index(){
        
        $name = Auth::user()->name;
        $settings = Setting::all();

        $settings2= DB::select('select * from settings_2');
        return view('Admin.Page.settings',['settings'=>$settings[0],'settings2'=>$settings2,'name'=>$name]);
    }
    
    public function listRestaurants(){
        $query ='
        SELECT restaurant.*, users.id as uID, users.name as uName, users.email as uEmail,users.role as uRole , city.name as cName, town.name as tName FROM `restaurant` 
        JOIN users on restaurant.ownerID = users.id
        JOIN city on restaurant.city = city.id
        JOIN town on restaurant.town = town.id
        order by id desc';
        
        $restaurants = DB::select($query);

        return view('Admin.Page.listRestaurants',['restaurants'=>$restaurants ]);
    }
    public function addRestaurantPage(){
        
        $cities = DB::table('city')->get();
        return view('Admin.Page.addRestaurants',['cities'=>$cities]);
    }

    public function listUsersPage(){
        
        $users = DB::select('SELECT users.*, town.name as tname, city.name as cname FROM users 
        JOIN town on users.town = town.id
        JOIN city on users.city = city.id
        ');

        return view('Admin.Page.listUsers',['users'=>$users]);
    }

    function deleteRestaurant($id){
        
        DB::table('restaurant')->where('id', $id)->update(
            [
                'status' => 'closed'
            ]);

        $query = 'update users set status = 0 where id = (select ownerID from restaurant where id='.$id.')';
        DB::select($query);
        return view('Admin.Page.success',['success'=>"Restaurant ve kullanıcısı başarılı bir şekilde kapatıldı."]);
    }
    
    function updateRestaurantPage($id){
        
        $query = 'select * from restaurant where id='.$id;
        $restaurant = DB::select($query); 
        return view('Admin.Page.editRestaurant',['restaurant'=>$restaurant[0]]);
    }

    function updateRestaurant(Request $request){
        $result = DB::table('restaurant')->where('id', $request->id)->update(
            [
                'title' => $request->title,
                'keywords' => $request->keywords,
                'description' => $request->description,
                'status' => $request->status
            ]);

        $query = 'update users set role = "restaurant", restaurant_id='.$request->id.' where id = (select ownerID from restaurant where id='.$request->id.')';
        DB::select($query);
        return view('Admin.Page.success',['success'=>"Restaurant başarı ile güncellendi."]);
         
    }

    public function addRestaurant(Request $request){
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
            'ownerID'=> Auth::user()->id,
            'point'=> 10,
            'min_cart'=> 10,
            'serve_price'=> 5,
            'serve_time'=> 20
        ]);

        if($res){
            return view('Admin.Page.success',['success'=>"Restaurant başarı ile eklendi."]);
        }
        else{
            return view('Admin.Page.error',['error'=>"Restaurant eklenirken hata gerçekleşti!"]);
        }
        
    }

    function deleteUser($id){
        
        DB::table('users')->where('id', $id)->update(
            [
                'status' => 0
            ]);
        DB::table('restaurant')->where('ownerID', $id)->update(
            [
                'status' => 'closed'
            ]);
        return view('Admin.Page.success',['success'=>"Kullanıcı ve sahip olduğu restaurant başarılı bir şekilde kapatıldı."]);
    }
    
    function updateUserPage($id){

        $query = 'select * from users where id='.$id;
        $query2 = 'select * from role';
        $user = DB::select($query); 
        $roles = DB::select($query2); 
        return view('Admin.Page.editUser',['user'=>$user[0],'roles'=>$roles]);
    }

    function updateUser(Request $request){
        $result = DB::table('users')->where('id', $request->id)->update(
            [
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'role'=>$request->role,
                'status' => $request->status
            ]);

        $query = 'update users set role = "restaurant", restaurant_id='.$request->id.' where id = (select ownerID from restaurant where id='.$request->id.')';
        DB::select($query);
        return view('Admin.Page.success',['success'=>"Restaurant başarı ile güncellendi."]);
         
    }

    public function updateSettings(Request $request){
        
        $newsettings = new Setting;
        $newsettings->tittle =$request->tittle;
        $newsettings->keywords =$request->keywords;
        $newsettings->description =$request->description;
        $newsettings->company=$request->company;
        $newsettings->address=$request->address;
        $newsettings->phone=$request->phone;
        $newsettings->fax=$request->fax;
        $newsettings->email=$request->email;
        $newsettings->smtpserver=$request->smtpserver;
        $newsettings->smtpemail=$request->smtpemail;
        $newsettings->smtpport=$request->smtpport;
        $newsettings->facebook=$request->facebook;
        $newsettings->instagram=$request->instagram;
        $newsettings->twitter=$request->twitter;
        $newsettings->aboutus=$request->aboutus;
        $newsettings->contact=$request->contact;
        $newsettings->references=$request->references;
        $newsettings->company=$request->company;
        $newsettings->status=1;
        $newsettings->ksozlesmesi=$request->ksozlesmesi;


        $affected = DB::table('settings')->where('id', 1)->update(
            [
                'tittle' => $newsettings->tittle,
                'keywords' => $newsettings->keywords,
                'description' =>$newsettings->description,
                'company' =>$newsettings->company,
                'address' =>$newsettings->address,
                'phone' =>$newsettings->phone,
                'fax' =>$newsettings->fax,
                'email' =>$newsettings->email,
                'smtpserver' =>$newsettings->smtpserver,
                'smtpemail' =>$newsettings->smtpemail,
                'smtpport' =>$newsettings->smtpport,
                'facebook' =>$newsettings->facebook,
                'instagram' =>$newsettings->instagram,
                'twitter' =>$newsettings->twitter,
                'aboutus' =>$newsettings->aboutus,
                'contact' =>$newsettings->contact,
                'references' =>$newsettings->references,
                'company' =>$newsettings->company,
                'status' =>$newsettings->status,
                'ksozlesmesi'=>$newsettings->ksozlesmesi
            ]);

        $settings = Setting::all();
        return view('Admin.Page.success',['success'=>'Ayarlar başarıyla güncellendi.']);
    }

    public function updateSettings2(Request $request){
        
        $res = DB::table('settings_2')->insert([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if($res){
            return view('Admin.Page.success',['success'=>"Ayar başarıyla eklendi."]);
        }
        else{
            return view('Admin.Page.error',['error'=>"Ayar eklenirken hata gerçekleşti!"]);
        }
    }
    
    public function delUpdateSettings2($id){

        $res =  $deleted = DB::table('settings_2')->where('id', '=', $id)->delete();
        
        if($res){
            return view('Admin.Page.success',['success'=>"Ayar başarıyla silindi."]);
        }
        else{
            return view('Admin.Page.error',['error'=>"Ayar silinirken hata gerçekleşti!"]);
        }
    }

}
