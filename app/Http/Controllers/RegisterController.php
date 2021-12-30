<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Mail;


class RegisterController extends Controller
{


    public function index(){

        if(Auth::user()){
            return redirect()->back();
        }else{
            $cities = DB::table('city')->get();
            return view('Login.register',['cities'=>$cities]);
        }
        
    }

    public function store(Request $request){
        
        if(Auth::user()){
            return redirect()->intended('restaurant/istanbul');
        }else{

            $token= Str::random(60);
            $user = new User;
            $user->name= $request->name;
            $user->surname= $request->surname;
            $user->email= $request->email;
            $user->password= Hash::make($request->password);
            $user->address= $request->address;
            $user->city= $request->city;
            $user->town= $request->town;
            $user->role= 'user';
            $user->token = $token;
            $user->status = 0;
            
            $this->sendMail($request->email,$token);

            try{
                $user->save();
                return view('Register.success',['success'=>"Kayıt işlemi başarılı. Mail'inize gelen doğrulama linkine tıklayarak hesabınızı aktif edin."]);
             }
             catch(\Exception $e){            
                return view('Register.error',['error'=>"Kayıt işlemi sırasında sorun oluştu!"]);
             }


        }
    }

    function activateUser($token){
        $r=DB::table('users')->where('token', $token)->update(
        [
            'status' => '1'
        ]);
        if($r)
            return view('Register.success',['success'=>"Hesabınız Aktif Edildi"]);
        else 
            return view('Register.error',['error'=>"Hata. Hesap aktif edilemedi."]);
    }

    public function sendMail($to,$token){
        
        $array = [
            'mail'=>$to,
            'token'=>$token
        ];

        mail::send('Register.messagebody',$array, function($message){
            $message->subject('YemekDiyarı (WEB)');
            $message->to("gunel4755@gmail.com");
        });
    }


}
