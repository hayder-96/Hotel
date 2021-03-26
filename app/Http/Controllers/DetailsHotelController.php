<?php

namespace App\Http\Controllers;

use App\Models\DetailsHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class DetailsHotelController extends BaseController
{
  

    public function indexx($id)
    {
        $hotel=DetailsHotel::all()->where('details_id',$id);

        return $this->Respone($hotel,200);
    }

    
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

            'typeroom',
            'nameroom',
            'priceroom',
            'typebed',
            'numbed',
            'numguest',
            'Facilities',
            'meansofcomfort',
            'kids',
            'animals',
            'access',
            'breckfast',
            'details_id',
            'numroom',
            'imageroom1',
            'imageroom2',
            'imageroom3',
        ]);

        if($valdit->fails()){

            return $this->sendError('Failed input',$valdit->errors());
        }

    
        if($request->imageroom1!=null && $request->imageroom2!=null && $request->imageroom3!=null){
            $path1= Cloudinary::upload($request->file('imageroom1')->getRealPath(),
    
            array("public_id" =>$request->name1,"quality"=>'auto'))->getSecurePath();
            
            $path2= Cloudinary::upload($request->file('imageroom2')->getRealPath(),
    
            array("public_id" =>$request->name2,"quality"=>'auto'))->getSecurePath();
            
            $path3= Cloudinary::upload($request->file('imageroom3')->getRealPath(),
    
            array("public_id" =>$request->name3,"quality"=>'auto'))->getSecurePath();
            



            $input['imageroom1']=$path1;
            $input['imageroom2']=$path2;
            $input['imageroom3']=$path3;
       
        }

        $hotel=DetailsHotel::create($input);

        return $this->Respone($hotel,'Success input');
    }

   
    public function show(DetailsHotel $detailsHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailsHotel  $detailsHotel
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailsHotel $detailsHotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailsHotel  $detailsHotel
     * @return \Illuminate\Http\Response
     */
    public function updatee(Request $request)
    {
        

        $hotel=DetailsHotel::find($request->id);

        


          if($request->imageroom1!=null){
        
    
            $path1= Cloudinary::upload($request->file('imageroom1')->getRealPath(),
            array("public_id" =>$request->name1,"quality"=>'auto'))->getSecurePath();
            
          }



          if($request->imageroom2!=null){
        
    
            $path2= Cloudinary::upload($request->file('imageroom2')->getRealPath(),
            array("public_id" =>$request->name2,"quality"=>'auto'))->getSecurePath();
            
          }



          if($request->imageroom3!=null){
        
    
            $path3= Cloudinary::upload($request->file('imageroom3')->getRealPath(),
            array("public_id" =>$request->name3,"quality"=>'auto'))->getSecurePath();
            
          }

      


        if($request->imageroom1!=null){

            $hotel->imageroom1=$path1;
        }

        if($request->imageroom2!=null){

            $hotel->imageroom2=$path2;
        }

        if($request->imageroom3!=null){

            $hotel->imageroom3=$path3;
        }





       $hotel->typeroom=$request->typeroom;
       $hotel->nameroom=$request->nameroom;
       $hotel->priceroom=$request->priceroom;
       $hotel->typebed=$request->typebed;
       $hotel->numbed=$request->numbed;
       $hotel->numguest=$request->numguest;
       $hotel->Facilities=$request->Facilities;
       $hotel->meansofcomfort=$request->meansofcomfort;
       $hotel->kids=$request->kids;
       $hotel->animals=$request->animals;
       $hotel->access=$request->access;
       $hotel->breckfast=$request->breckfast;
       $hotel->numroom=$request->numroom;

       $hotel->save();


       return $this->Respone($hotel,200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailsHotel  $detailsHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel=DetailsHotel::find($id);

        $hotel->delete();

        return $this->Respone($hotel,200);
    }
}
