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



    public function searchhotel($city)
    {
        
        $hotel=InformHotel::all()->where('city',$city);
        return $this->Respone($hotel,200);


    }














   
    public function store(Request $request)
    {
        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'name',
            'phone',
            'email',
            'country',
            'typetrip',
            'nameroom',
            'access',
            'leaving',
            'typeroom',
            'nameroom',
            'priceroom',
            'typebed',
            'typebed',
            'numguest',
            'admin_id'

            ]);

            if($valdit->fails()){
    
                return $this->sendError('Failed input',$valdit->errors());
            }


            $input['user_id']=Auth::id();

            $hotel=reservation::create($input);

            return $this->Respone($hotel,200);
    }

   
    public function show(reservation $reservation)
    {
        
    }

   
    public function edit(reservation $reservation)
    {
        
    }

   
    public function update(Request $request, reservation $reservation)
    {
        
    }

   
    public function destroy(reservation $reservation)
    {
     


    }
}
