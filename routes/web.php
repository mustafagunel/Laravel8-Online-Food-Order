<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AjaxController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('restaurant/{city}',[HomeController::class,'index'])->where('city','[A-za-z]+');
Route::get('restaurant/{city}/{town}',[HomeController::class,'index2'])->where(['city'=>'[A-za-z]+','town'=>'[A-za-z]+']);
Route::get('restaurant/d/{id}', [HomeController::class,'index3']);


Route::get('/login',[LoginController::class,'index']);
//Route::get('/login/{name}',[LoginController::class,'test'])->where('name','[0-9]+');
Route::post('/login', [LoginController::class,'authenticate']);
Route::get('/logout', [LoginController::class,'logout']);


Route::get('/register',[RegisterController::class,'index']);
Route::post('/register', [RegisterController::class,'store']);

Route::get('/admin', [AdminController::class,'index']);
Route::get('/admin/{page}', [AdminController::class,'index2']);
Route::post('/admin/update/settings', [AdminController::class,'update']);
Route::post('/admin/add/restaurant', [AdminController::class,'addRestaurant']);



Route::post('/get/town', [AjaxController::class,'getTown']);

//temp Route::get('/admin/{s1}/{s2}', [AdminController::class,'topla'])->where(['s1'=>'[0-9]+','s2'=>'[0-9]+']);


Route::get('profile/restaurant', [RestaurantController::class,'index']);
Route::get('profile/restaurant/{page}', [RestaurantController::class,'index2']);
Route::get('profile/restaurant/add/product', [RestaurantController::class,'index3']);
Route::post('profile/restaurant/add/product', [RestaurantController::class,'addProduct']);



Route::get('/unauthenticated', function () {

})->name('unauthenticated');


//->middleware('auth'); check login  middleware('auth:admin');

Route::get('/', function () {
    return view('welcome');
});
