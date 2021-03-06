<?php

namespace App\Http\Controllers;

use App\Models\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Http\Resources\hotelcon;
use App\Models\InformHotel;
use Exception;
class ControllerController extends BaseController
{
   




    public function index()
    {
        
        $hotel=InformHotel::all()->where('enable','no');
        return $this->Respone(hotelcon::collection($hotel),200);
    }




    public function indexx()
    {
        
        $hotel=InformHotel::all()->where('enable','yes');
        return $this->Respone(hotelcon::collection($hotel),200);
    }




    public function deletehotel($id)
    {
        
        $hotel=InformHotel::find($id);

        $hotel->delete();
        return $this->Respone($hotel,200);
    }















    public function Register(Request $request){
    
        $validit=Validator::make($request->all(),[
    
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password',
    
        ]);
        if($validit->fails()){
    
            return $this->sendError('failed register!',$validit->errors());
        }
    
        $input=$request->all();
    
    
        
    
        $input['password']= Crypt::encrypt( $input['password']);
       
        $user=Controller::create($input);
         $success['token']=$user->createToken('hx/.<["kdkjvlz??spu9=-)c')->accessToken;
         $n=$user->name;
          
    
        return $this->Respone($success,$n);
    
        
    }
    public function Login(Request $request){

 

   

        $validit=Validator::make($request->all(),[
    
            'email'=>'required|email',
            'password'=>'required',
    
        ]);
       
        $user=Controller::where('email',$request->email)->first();
        $users=crypt::decrypt($user->password);
    
       
        if($users===$request->password && $user->email===$request->email){
            try{
         $succes['token']=$user->createToken('hx/.<["kdkjvlz??spu9=-)c')->accessToken;
    
         }catch(Exception $e){
    
             return $this->Respone($e,$succes);
    
         }
             return $this->Respone($succes,$users);
    
    
    
        }else{
            return $this->Respone(500,"????????????  ???? ?????????? ?????? ????????????");
        }  
    }





}
