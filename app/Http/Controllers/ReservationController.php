<?php

namespace App\Http\Controllers;

use App\Models\InformHotel;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ReservationController extends BaseController
{
   
    public function index()
    {
        
        $hotel=reservation::where('user_id',Auth::id())->get();
        return $this->Respone($hotel,200);


    }



   


    public function searchhotel(Request $request)
    {
        
        $hotel=InformHotel::all()->where('city',$request->city)->where('coutry',$request->country);
        return $this->Respone($hotel,200);


    }














   
    public function store(Request $request)
    {

        $idi=InformHotel::find($request->admin_id);
        $input=$request->all();

        $valdit=Validator::make($request->all(),[
            'name',
            'phone',             
            'email',
            'country',
            'typetrip',
            'typeroom',
            'nameroom',
            'priceroom',
            'access',
            'leaving',
            'typebed',
            'numbed',
            'numguest',
            'noty'
          

            ]);

            if($valdit->fails()){
    
                return $this->sendError('Failed input',$valdit->errors());
            }


            $input['user_id']=Auth::id();
           $input['namehotel']=$idi->namehotel;

     
      
           $hotel=reservation::create($input);

            return $this->Respone($hotel,200);
    }

   
    public function show(reservation $reservation)
    {
        
    }

   
    public function edit(reservation $reservation)
    {
        
    }

   
    public function update(Request $request,$id)
    {

        $hotel=reservation::find($id);

        $hotel->noty=$request->noty;
        $hotel->save();
        return $this->Respone($hotel,200);
        
    }

   
    public function destroy(reservation $reservation)
    {
     


    }
}
