<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BaseController;
use App\Models\Admin;
use Illuminate\Support\Facades\Crypt;
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


    

    $input['password']= Crypt::encrypt( $input['password']);
   
    $user=User::create($input);
     $success['token']=$user->createToken('hx/.<["kdkjvc823=-)c')->accessToken;
     $n=$user->name;
      

    return $this->Respone($success,$n);

    
}

public function Login(Request $request){

 

   

    $validit=Validator::make($request->all(),[

        'email'=>'required|email',
        'password'=>'required',

    ]);
   
    $user=User::where('email',$request->email)->first();
    $users=crypt::decrypt($user->password);

   
    if($users===$request->password && $user->email===$request->email){
        try{
     $succes['token']=$user->createToken(';ejhih/><{+876yk')->accessToken;

     }catch(Exception $e){

         return $this->Respone($e,$succes);

     }
         return $this->Respone($succes,$users);



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


    

    $input['password']= Crypt::encrypt( $input['password']);
   
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
   
    $user=Admin::where('email',$request->email)->first();
    $users=crypt::decrypt($user->password);

   
    if($users===$request->password && $user->email===$request->email){
        try{
     $succes['token']=$user->createToken(';ejhih/><{+876yk')->accessToken;

     }catch(Exception $e){

         return $this->Respone($e,$succes);

     }
         return $this->Respone($succes,$users);


    }else{
        return $this->Respone(500,"البريد  او الرمز غير متطابق");
    }  
}










}