<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantController;



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


Route::get('/login',[LoginController::class,'index']);
//Route::get('/login/{name}',[LoginController::class,'test'])->where('name','[0-9]+');
Route::post('/login', [LoginController::class,'authenticate']);
Route::get('/logout', [LoginController::class,'logout']);


Route::get('/register',[RegisterController::class,'index']);
Route::post('/register', [RegisterController::class,'store']);

Route::get('/admin', [AdminController::class,'index']);
Route::get('/admin/{page}', [AdminController::class,'index2']);

Route::get('profile/restaurant/{user}', [RestaurantController::class,'index']);
Route::get('profile/restaurant/{user}/{page}', [RestaurantController::class,'index2']);




Route::get('/unauthenticated', function () {

})->name('unauthenticated');


//->middleware('auth'); check login  middleware('auth:admin');

Route::get('/', function () {
    return view('welcome');
});
