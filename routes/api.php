<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\DetailsHotelController;
use App\Http\Controllers\ImageroomController;
use App\Http\Controllers\InformHotelController;
use App\Http\Controllers\NotifyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterandLogin;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/





Route::post('Register',[RegisterandLogin::class,'Register']);
Route::post('Login',[RegisterandLogin::class,'login']);





Route::post('Registerad',[RegisterandLogin::class,'Registeradmin']);
Route::post('Loginad',[RegisterandLogin::class,'loginadmin']);







Route::middleware('admin:admin')->group(function(){


    Route::resource('hotel',InformHotelController::class);

    Route::post('upinfo',[InformHotelController::class,'updatee']);

    Route::resource('details',DetailsHotelController::class);

    Route::post('updetails',[DetailsHotelController::class,'updatee']);




    Route::get('getdetail/{id}',[DetailsHotelController::class,'indexx']);


    Route::get('getusers/{id}',[InformHotelController::class,'indexxx']);



    Route::post('upeve',[InformHotelController::class,'upev']);


    Route::get('getnotyy',[InformHotelController::class,'getnoty']);




    Route::put('upen/{id}',[DetailsHotelController::class,'upena']);


    
    Route::resource('intonoty',NotifyController::class);

    



});





Route::middleware('auth:api')->group(function(){


    Route::resource('hoteluser',ReservationController::class);


    Route::post('search',[ReservationController::class,'searchhotel']);


    Route::resource('desc',DescriptionController::class);



    Route::get('desce/{id}',[DescriptionController::class,'indexx']);


    Route::resource('comm',CommentController::class);


    Route::get('com/{id}',[CommentController::class,'indexx']);


    Route::get('test/{id}',[CommentController::class,'gettest']);



    Route::get('notyno',[NotifyController::class,'getnotyno']);


    Route::get('notyyes',[NotifyController::class,'getnotyyes']);
    

    Route::put('upnoty/{id}',[NotifyController::class,'updatenoty']);
});
















Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
