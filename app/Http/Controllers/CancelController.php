<?php

namespace App\Http\Controllers;

use App\Models\cancel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\cancel as ca;
class CancelController extends BaseController
{
  
    public function index($id)
    {
        
        $hotel=cancel::orderBy('created_at','DESC')->where('room_id',$id);

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


        //$hotel=cancel::create($input);

        return $this->Respone($request->name,'Success input');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cancel  $cancel
     * @return \Illuminate\Http\Response
     */
    public function show(cancel $cancel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cancel  $cancel
     * @return \Illuminate\Http\Response
     */
    public function edit(cancel $cancel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cancel  $cancel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cancel $cancel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cancel  $cancel
     * @return \Illuminate\Http\Response
     */
    public function destroy(cancel $cancel)
    {
        //
    }
}
