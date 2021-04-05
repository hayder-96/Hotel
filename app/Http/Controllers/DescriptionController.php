<?php

namespace App\Http\Controllers;

use App\Models\description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DescriptionController extends BaseController
{
   
    public function indexx($id)
    {
        
        $hotel=description::where('desc_id',$id)->first();

        if($hotel==null){

            return $this->Respone(200,'no');
            
        }else{

            return $this->Respone($hotel,'yes');
        }

    }

    

    
    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        


        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'userrating',
                'content',
                'desc_id'
        ]);

        if($valdit->fails()){

            return $this->sendError('Failed input',$valdit->errors());
        }

        
      
        $hotel=description::create($input);

        return $this->Respone($hotel,'Success input');





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\description  $description
     * @return \Illuminate\Http\Response
     */
    public function show(description $description)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\description  $description
     * @return \Illuminate\Http\Response
     */
    public function edit(description $description)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\description  $description
     * @return \Illuminate\Http\Response
     */
    public function updatee(Request $request)
    {
      
        $hotel=description::where('desc_id',$request->id)->first();
        $hotel->content=$request->content;

        $hotel->save();

        return $this->Respone($hotel,200);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\description  $description
     * @return \Illuminate\Http\Response
     */
    public function destroy(description $description)
    {
        //
    }
}
