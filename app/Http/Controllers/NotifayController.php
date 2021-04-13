<?php

namespace App\Http\Controllers;

use App\Models\notifay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\noty;
class NotifayController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $hotel=notifay::all()->where('admin_id',Auth::id())->where('noty','no');

        return $this->Respone($hotel,200);

    }

    public function indexx()
    {
        

        $hotel=notifay::all()->where('admin_id',Auth::id())->where('noty','yes');

        return $this->Respone($hotel,200);

    }






    public function indexxx()
    {
        

        $hotel=notifay::all()->where('admin_id',null)->where('noty','no');

        return $this->Respone(noty::collection($hotel),200);

    }

    public function indexxxx()
    {
        

        $hotel=notifay::all()->where('admin_id',null)->where('noty','yes');

        return $this->Respone(noty::collection($hotel),200);

    }






   
    public function store(Request $request)
    {
       
        $input=$request->all();

        $valdit=Validator::make($request->all(),[
            'admin_id',
            'content',
            'noty'

            ]);

            if($valdit->fails()){
    
                return $this->sendError('Failed input',$valdit->errors());
            }


        
      
           $hotel=notifay::create($input);

            return $this->Respone($hotel,200);
    }
    

    public function show(notifay $notifay)
    {
        //
    }

  
    public function edit(notifay $notifay)
    {
        //
    }

   
    public function update(Request $request,$id)
    {
    

        $hotel=notifay::find($id);

        $hotel->noty=$request->noty;
        $hotel->save();

        return $this->Respone($hotel,200);
    }

   
    public function destroy($id)
    {
        
        $hotel=notifay::find($id);

        $hotel->delete();

        return $this->Respone($hotel,200);
    }
}
