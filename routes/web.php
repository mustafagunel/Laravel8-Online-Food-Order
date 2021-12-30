<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;



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


Route::get('/', [HomeController::class,'selectRestaurant']);
Route::get('/restaurant/{city}',[HomeController::class,'index'])->where('city','[A-za-z]+');
Route::get('/restaurant/{city}/{town}',[HomeController::class,'index2'])->where(['city'=>'[A-za-z]+','town'=>'[A-za-z]+']);
Route::get('/restaurant/d/{id}', [HomeController::class,'index3']);
Route::post('/getproductlw',[HomeController::class,'getproductlw'])->name('getproductlw');
Route::post('/getrestaurantlw',[HomeController::class,'getrestaurantlw'])->name('getrestaurantlw');

Route::post('/add/add-to-cart', [AjaxController::class,'addToCart']);
Route::post('/get/town', [AjaxController::class,'getTown']);
Route::post('/get/get-cart', [AjaxController::class,'getCart']);
Route::post('/remove/item', [AjaxController::class,'removeItem']);

Route::get('/cart',[CartController::class, 'getCart']);
Route::post('/pay/{type}',[CartController::class, 'checkOut']);



Route::get('profile/user/{id}', [UserController::class,'index']);



Route::middleware('restaurant')->get('/profile/restaurant', [RestaurantController::class,'index']);
Route::middleware('restaurant')->get('/profile/restaurant/products', [RestaurantController::class,'listProducts']);
Route::middleware('restaurant')->get('/profile/restaurant/add/product', [RestaurantController::class,'addProductPage']);
Route::middleware('restaurant')->post('/profile/restaurant/add/product', [RestaurantController::class,'addProduct']);
Route::middleware('restaurant')->get('/profile/restaurant/list/orders', [RestaurantController::class,'listOrders']);
Route::middleware('restaurant')->get('/profile/complate/order/{id}', [RestaurantController::class,'complateOrder']);
Route::middleware('restaurant')->get('/profile/cancel/order/{id}', [RestaurantController::class,'cancelOrder']);
Route::middleware('restaurant')->get('/profile/delete/product/{id}', [RestaurantController::class,'deleteProduct']);
Route::middleware('restaurant')->get('/profile/update/product/{id}', [RestaurantController::class,'updateProductPage']);
Route::middleware('restaurant')->post('/profile/restaurant/update/product', [RestaurantController::class,'updateProduct']);

Route::middleware('restaurant')->get('/profile/detail/order/{id}', [RestaurantController::class,'getOrderDetail']);

Route::middleware('admin')->get('/admin', [AdminController::class,'index']);
Route::middleware('admin')->get('/admin/settings', [AdminController::class,'index']);
Route::middleware('admin')->get('/admin/restaurant-list', [AdminController::class,'listRestaurants']);
Route::middleware('admin')->get('/admin/restaurant-add', [AdminController::class,'addRestaurantPage']);
Route::middleware('admin')->post('/admin/add/restaurant', [AdminController::class,'addRestaurant']);
Route::middleware('admin')->get('/admin/user-list', [AdminController::class,'listUsersPage']);
Route::middleware('admin')->get('/admin/delete/restaurant/{id}', [AdminController::class,'deleteRestaurant'])->where('name','[0-9]+');
Route::middleware('admin')->get('/admin/edit/restaurant/{id}', [AdminController::class,'updateRestaurantPage'])->where('name','[0-9]+');
Route::middleware('admin')->post('/admin/update/restaurant', [AdminController::class,'updateRestaurant']);

Route::middleware('admin')->get('/admin/delete/user/{id}', [AdminController::class,'deleteUser'])->where('name','[0-9]+');
Route::middleware('admin')->get('/admin/edit/user/{id}', [AdminController::class,'updateUserPage'])->where('name','[0-9]+');
Route::middleware('admin')->post('/admin/edit/user', [AdminController::class,'updateUser']);
Route::middleware('admin')->post('/admin/update/settings', [AdminController::class,'updateSettings']);



Route::get('/register',[RegisterController::class,'index']);
Route::post('/register', [RegisterController::class,'store']);

Route::get('/login',[LoginController::class,'index']);
Route::post('/login', [LoginController::class,'authenticate']);
Route::get('/logout', [LoginController::class,'logout']);


Route::middleware('user')->get('/application-restaurant',[ApplicationController::class,'index']);
Route::middleware('user')->post('/application-restaurant',[ApplicationController::class,'applicationRegister']);

Route::get('/user/activate/{token}',[RegisterController::class,'activateUser']);

/*

Route::get('restaurant', [HomeController::class,'selectRestaurant']);
Route::get('/', [HomeController::class,'selectRestaurant']);
Route::get('/sss', [HomeController::class,'sss']);
Route::get('/kullanicisozlesmesi', [HomeController::class,'ksozlesme']);
Route::get('/iletisim', [HomeController::class,'iletisim']);
Route::post('/send-message', [HomeController::class,'sendMail']);


//Route::get('/login/{name}',[LoginController::class,'test'])->where('name','[0-9]+');








Route::get('profile/restaurant/{page}', [RestaurantController::class,'index2']);








*/




Route::get('/unauthenticated', function () {
    return ('
        İzinsiz giriş tespit edildi. Bu sayfaya girmeye yetkiniz yok.
    ');
})->name('unauthenticated');


//->middleware('auth'); check login  middleware('auth:admin');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
