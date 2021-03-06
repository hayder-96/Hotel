<?php

use App\Http\Controllers\CancelController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ControllerController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\DetailsHotelController;
use App\Http\Controllers\ImageroomController;
use App\Http\Controllers\InformHotelController;
use App\Http\Controllers\NotifayController;
use App\Http\Controllers\NotifyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterandLogin;
use App\Http\Controllers\ReservationController;
use App\Models\InformHotel;

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







Route::post('Registercon',[ControllerController::class,'Register']);
Route::post('Loginadcon',[ControllerController::class,'login']);



Route::middleware('contr:controll')->group(function(){


    
    Route::resource('hotelcon', ControllerController::class);
    


    Route::get('gethotelyes',[ControllerController::class,'indexx']);


    Route::put('upenable/{id}',[InformHotelController::class,'updateenable']);



    Route::resource('notycon',NotifayController::class);



    Route::delete('delete/{id}',[ControllerController::class,'deletehotel']);



    Route::get('getdetail/{id}',[DetailsHotelController::class,'indexx']);

    Route::resource('details',DetailsHotelController::class);


    Route::get('getdetails/{id}',[DetailsHotelController::class,'indexxx']);



    Route::put('updateshow/{id}',[DetailsHotelController::class,'upshow']);


    Route::resource('can',CancelController::class);

    Route::get('getcan/{id}',[CancelController::class,'index']);


    Route::resource('details',DetailsHotelController::class);

});




//,'throttle:rate_limit,1'

Route::middleware('admin:admin')->group(function(){


    Route::resource('hotel',InformHotelController::class);

    Route::post('upinfo',[InformHotelController::class,'updatee']);

    Route::resource('details',DetailsHotelController::class);

    Route::post('updetails',[DetailsHotelController::class,'updatee']);




    Route::get('getdetails/{id}',[DetailsHotelController::class,'indexxx']);




    Route::get('getusers/{id}',[InformHotelController::class,'indexxx']);




    Route::post('upeve',[InformHotelController::class,'upev']);


    Route::get('getnotyy',[InformHotelController::class,'getnoty']);




    Route::put('upen/{id}',[DetailsHotelController::class,'upena']);


    
    Route::resource('intonoty',NotifyController::class);

    
    Route::resource('desc',DescriptionController::class);


    Route::get('desce/{id}',[DescriptionController::class,'indexx']);


    Route::post('updesc',[DescriptionController::class,'updatee']);





    Route::resource('notycon',NotifayController::class)->middleware('throttle:60,1');
    

    Route::get('getnotyconyes',[NotifayController::class,'indexx']);


    Route::get('getnotynoall',[NotifayController::class,'indexxx']);



    Route::get('getnotyyesall',[NotifayController::class,'indexxxx']);





   
    Route::get('getcan/{id}',[CancelController::class,'index']);





    Route::get('getopenall',[NotifayController::class,'getopenall']);



    Route::get('getopenyes',[NotifayController::class,'getopenyes']);





});





Route::middleware('auth:api')->group(function(){




    Route::get('getid',[RegisterandLogin::class,'getId']);







    Route::resource('hoteluser',ReservationController::class);


    Route::post('search',[ReservationController::class,'searchhotel']);


    



    Route::get('desce/{id}',[DescriptionController::class,'indexx']);


    Route::resource('comm',CommentController::class);


    Route::get('com/{id}',[CommentController::class,'indexx']);


    Route::get('test/{id}',[CommentController::class,'gettest']);



    Route::get('notyno',[NotifyController::class,'getnotyno']);



    Route::get('notyyes',[NotifyController::class,'getnotyyes']);
    

    Route::put('upnoty/{id}',[NotifyController::class,'updatenoty']);


    Route::resource('deletenoty',NotifyController::class);
});
















Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
