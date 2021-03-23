<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BaseController;
use App\Models\Admin;
use Exception;
use Laravel\Passport\Passport;

class RegisterandLogin extends BaseController{

    


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


    

    $input['password']= Hash::make($input['password']);
   
    $user=User::create($input);
     $success['token']=$user->createToken('hx/.<["kdkjvc823=-)c')->accessToken;
     $success['name']=$user->name;
      

    return $this->Respone($success,'تم التسجيل ');

    
}

public function Login(Request $request){

 

   

    $validit=Validator::make($request->all(),[

        'email'=>'required|email',
        'password'=>'required',

    ]);
   
    if( Auth::attempt(['email' => $request->email, 'password' => $request->password])){

        $user=Auth::user();

         
        $success['token']=$user->createToken('hx/.<["kdkjvc823=-)c')->accessToken;

            return $this->Respone($success,"تم الدخول");


    }else{
        return $this->Respone(500,"البريد  او الرمز غير متطابق");
    }  
}
















public function Registeradmin(Request $request){
   

    
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


    

    $input['password']= Hash::make($input['password']);
   
    $user=Admin::create($input);
     $success['token']=$user->createToken(';ejhih/><{+876yk')->accessToken;
     $success['name']=$user->name;
      

    return $this->Respone($success,'تم التسجيل ');

    
}

public function Loginadmin(Request $request){

   

   

    $validit=Validator::make($request->all(),[

        'email'=>'required|email',
        'password'=>'required',

    ]);
   
    if( Auth::attempt(['email' => $request->email, 'password' => $request->password])){

        $user=Auth::user();

         
        $success['token']=$user->createToken(';ejhih/><{+876yk')->accessToken;

            return $this->Respone($success,"تم الدخول");


    }else{
        return $this->Respone(500,"البريد  او الرمز غير متطابق");
    }  
}










}