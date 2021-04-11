<?php

namespace App\Http\Controllers;

use App\Models\notifay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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
        

        $hotel=notifay::all()->where('admin_id','null')->where('noty','no');

        return $this->Respone($hotel,200);

    }

    public function indexxxx()
    {
        

        $hotel=notifay::all()->where('admin_id','null')->where('noty','yes');

        return $this->Respone($hotel,200);

    }




















    





















   
    public function create()
    {
        



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
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notifay  $notifay
     * @return \Illuminate\Http\Response
     */
    public function show(notifay $notifay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notifay  $notifay
     * @return \Illuminate\Http\Response
     */
    public function edit(notifay $notifay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notifay  $notifay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    

        $hotel=notifay::find($id);

        $hotel->noty=$request->noty;
        $hotel->save();

        return $this->Respone($hotel,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notifay  $notifay
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $hotel=notifay::find($id);

        $hotel->delete();

        return $this->Respone($hotel,200);
    }
}
