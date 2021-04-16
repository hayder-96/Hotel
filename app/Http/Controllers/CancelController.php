<?php

namespace App\Http\Controllers;

use App\Models\cancel as cc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\cancel as ca;
class CancelController extends BaseController
{
  
    public function index($id)
    {
        
        $hotel=cc::orderBy('created_at','DESC')->where('room_id',$id);

        return $this->Respone(ca::collection($hotel),200);
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
       

        $input=$request->all();

        $valdit=Validator::make($request->all(),[

        'name',
        'content',
        'room_id'

        ]);

        if($valdit->fails()){

            return $this->sendError('Failed input',$valdit->errors());
        }


        $hotel=cc::create($input);

        return $this->Respone($request->name,'Success input');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cancel  $cancel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

  
    public function update(Request $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cancel  $cancel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
