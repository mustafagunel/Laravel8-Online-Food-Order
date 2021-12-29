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
        
        $page="settings";
        
        if(Auth::user()){
            if(Auth::user()->role == "admin"){
                $name = Auth::user()->name;
                $settings = Setting::all();
                return view('Admin.index',['page'=>$page,'settings'=>$settings[0],'name'=>$name]);
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
            $page="settings";

        if(Auth::user()){
            if(Auth::user()->role == "admin"){
                if($page == "restaurant-add"){
                    $cities = DB::table('city')->get();

                    return view('Admin.index',['page'=>$page,'cities'=>$cities]);                
                }elseif($page == "restaurant-list"){
                    $query ='
                    SELECT restaurant.*, users.id as uID, users.name as uName, users.email as uEmail,users.role as uRole , city.name as cName, town.name as tName FROM `restaurant` 
                    JOIN users on restaurant.ownerID = users.id
                    JOIN city on restaurant.city = city.id
                    JOIN town on restaurant.town = town.id';
                    
                    $restaurants = DB::select($query);

                    return view('Admin.index',['page'=>$page,'restaurants'=>$restaurants ]);                
                }else{
                    $settings = Setting::all();
                    return view('Admin.index',['page'=>$page,'settings'=>$settings[0]]);
                }
            }
            else{
                return redirect()->intended('unauthenticated');
            }
        }else{
            return redirect()->intended('login');
        }
    }

    public function update(Request $request){
        if(!isset($page))
            $page="settings";

        if(Auth::user()){
            if(Auth::user()->role == "admin"){
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
                        'status' =>$newsettings->status
                    ]);

                $settings = Setting::all();
                return view('Admin.index',['affected'=>$affected,'settings'=>$settings[0],'page'=>$page]);

            }
            else{
                return redirect()->intended('unauthenticated');
            }
        }else{
            return redirect()->intended('login');
        }
    }

    
    public function addRestaurant(Request $request){
        if(Auth::user()){
            if(Auth::user()->role == "admin"){
                
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
                    'ownerID'=> Auth::user()->id
                ]);

                $cities = DB::table('city')->get();
                $page="restaurant-add";
                return view('Admin.index',['page'=>$page,'success'=>"Restaurant başarı ile eklendi."]); 
            }
            else{
                return redirect()->intended('unauthenticated');
            }
        }else{
            
            return redirect()->intended('login');
        }
    }

    function deleteRestaurant($id){
        
        if(Auth::user()->role == 'admin'){
            /*
            $query = 'DELETE FROM `restaurant` WHERE id='.$id;
            $r = DB::delete($query);
            */
            DB::table('restaurant')->where('id', $id)->update(
                [
                    'status' => 'closed'
                ]);

            $query = 'update users set status = 0 where id = (select ownerID from restaurant where id='.$id.')';
            DB::select($query);
            
            return view('Admin.index',['success'=>"Restaurant ve kullanıcısı başarılı bir şekilde kapatıldı."]);
        
        }else{
            return view('unauthenticated');    
        }
    }

    function updateRestaurant($id){
        
        if(Auth::user()->role == 'admin'){                
            $page = "update-restaurant";
            $query = 'select * from restaurant where id='.$id;
            $restaurant = DB::select($query); 
            return view('Admin.index',['page'=>$page,'restaurant'=>$restaurant[0]]); 
        
        }else{
            return view('unauthenticated');    
        }
    }


    function updateRestaurantPost(Request $request){
        if(Auth::user()->role == 'admin'){         
            
            $result = DB::table('restaurant')->where('id', $request->id)->update(
                [
                    'title' => $request->title,
                    'keywords' => $request->keywords,
                    'description' => $request->description,
                    'status' => $request->status
                ]);

            $query = 'update users set role = "restaurant", restaurant_id='.$request->id.' where id = (select ownerID from restaurant where id='.$request->id.')';
            DB::select($query);
            
            //kullanıcıya onaylandı mail'i iletilecek.
            return view('Admin.index',['success'=>"Restaurant başarı ile güncellendi."]); 
        }else{
            return view('unauthenticated');    
        }
    }

}
