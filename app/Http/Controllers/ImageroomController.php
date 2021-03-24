<?php

namespace App\Http\Controllers;

use App\Models\imageroom;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Validator;
class ImageroomController extends BaseController
{
  
    public function indexx($id)
    {
        $hotel=imageroom::all()->where('image_id',$id);
        return $this->Respone($hotel,200);
    }

   

    
    public function store(Request $request)
    {
        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'image'=>'required',
            'image_id'=>'required'
        ]);

        if($valdit->fails()){

            return $this->sendError('Failed input',$valdit->errors());
        }

        
        $path= Cloudinary::upload($request->file('image')->getRealPath(),

        array("public_id" =>$request->name,"quality"=>'auto'))->getSecurePath();
        
      
      
        $input['image']=$path;
      
        $hotel=imageroom::create($input);

        return $this->Respone($hotel,'Success input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\imageroom  $imageroom
     * @return \Illuminate\Http\Response
     */
    public function show(imageroom $imageroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\imageroom  $imageroom
     * @return \Illuminate\Http\Response
     */
    public function edit(imageroom $imageroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\imageroom  $imageroom
     * @return \Illuminate\Http\Response
     */
    public function updatee(Request $request)
    {
        

        $uss=imageroom::find($request->id);
        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'image'=>'required',
           
        ]);

        if($valdit->fails()){

            return $this->sendError('Failed input',$valdit->errors());
        }

        

        if($request->image!=null){
        
    
            $path= Cloudinary::upload($request->file('image')->getRealPath(),
            array("public_id" =>$request->name,"quality"=>'auto'))->getSecurePath();
            
          }
       
       

        if($request->image!=null){

            $uss->image=$path;
        }
        $uss->save();

        return $this->Respone($uss,'Success update');








    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\imageroom  $imageroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(imageroom $imageroom)
    {
        //
    }
}
