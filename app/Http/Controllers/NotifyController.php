<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NotifyController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }



    public function getnotyno()
    {
        
        $hotel=notify::all()->where('user_id',Auth::id())->where('noty','no');

        return $this->Respone($hotel,200);
    }


    public function getnotyyes()
    {
        
        $hotel=notify::all()->where('user_id',Auth::id())->where('noty','yes');

        return $this->Respone($hotel,200);
    }











    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      

        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'content',
            'user_id',
            'namehotel',
            'noty'
        ]);

        if($valdit->fails()){

            return $this->sendError('Failed input',$valdit->errors());
        }

        
        $input['admin_id']=Auth::id();
      
        $hotel=notify::create($input);

        return $this->Respone($hotel,'Success input');




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function show(notify $notify)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function edit(notify $notify)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $hotel=notify::find($id);

        $hotel->noty=$request->noty;
        $hotel->save();
    }



    public function updatenoty(Request $request,$id)
    {
        $hotel=notify::find($id);

        $hotel->noty=$request->noty;
        $hotel->save();
    }







    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function destroy(notify $notify)
    {
        //
    }
}
