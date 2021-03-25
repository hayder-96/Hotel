<?php

namespace App\Http\Controllers;

use App\Models\InformHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\reservation;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class InformHotelController extends BaseController
{
   

    
    public function index()
    {
        
        $hotel=InformHotel::all();
        return $this->Respone($hotel,200);
    }

  
    public function indexxx($id)
    {
        
        $hotel=reservation::all()->where('admin_id',$id);
        return $this->Respone($hotel,200);


    }


    public function store(Request $request)
    {
        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'namehotel',
            'evaluation',
            // 'image1',
            // 'image2',
            // 'image3',
            'manger',
            'number',
            'country',
            'city',
            'latitude',
            'longtude',
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
            'breckfast'
        ]);

        if($valdit->fails()){

            return $this->sendError('Failed input',$valdit->errors());
        }

        
        $input['admin_id']=Auth::id();


       
       
    
        if($request->image1!=null && $request->image2!=null && $request->image3!=null){
            $path1= Cloudinary::upload($request->file('image1')->getRealPath(),
    
            array("public_id" =>$request->name1,"quality"=>'auto'))->getSecurePath();
            
            $path2= Cloudinary::upload($request->file('image2')->getRealPath(),
    
            array("public_id" =>$request->name2,"quality"=>'auto'))->getSecurePath();
            
            $path3= Cloudinary::upload($request->file('image3')->getRealPath(),
    
            array("public_id" =>$request->name3,"quality"=>'auto'))->getSecurePath();
            


            $path4= Cloudinary::upload($request->file('imageroom1')->getRealPath(),
    
            array("public_id" =>$request->name4,"quality"=>'auto'))->getSecurePath();
            

            $path5= Cloudinary::upload($request->file('imageroom2')->getRealPath(),
    
            array("public_id" =>$request->name5,"quality"=>'auto'))->getSecurePath();
            


            $path6= Cloudinary::upload($request->file('imageroom3')->getRealPath(),
    
            array("public_id" =>$request->name6,"quality"=>'auto'))->getSecurePath();
            





            $input['image1']=$path1;
            $input['image2']=$path2;
            $input['image3']=$path3;
            $input['imageroom1']=$path4;
            $input['imageroom2']=$path5;
            $input['imageroom3']=$path6;
       
        }else{
            $input['image1']='no';
            $input['image2']='no';
            $input['image3']='no';

        }

        $hotel=InformHotel::create($input);

        return $this->Respone($hotel,'Success input');
    }

   
    public function show(InformHotel $informHotel)
    {
        
    }

    
  
    public function updatee(Request $request)
    {
        $hotel=InformHotel::find($request->id);

        

        if($request->image1!=null){
        
    
            
            $path1= Cloudinary::upload($request->file('image1')->getRealPath(),
            array("public_id" =>$request->name1,"quality"=>'auto'))->getSecurePath();
            
          }

          if($request->image2!=null){
        
    
            $path2= Cloudinary::upload($request->file('image2')->getRealPath(),
            array("public_id" =>$request->name2,"quality"=>'auto'))->getSecurePath();
            
          }

          if($request->image3!=null){
        
    
            $path3= Cloudinary::upload($request->file('image3')->getRealPath(),
            array("public_id" =>$request->name3,"quality"=>'auto'))->getSecurePath();
            
          }




          if($request->imageroom1!=null){
        
    
            $path4= Cloudinary::upload($request->file('imageroom1')->getRealPath(),
            array("public_id" =>$request->name4,"quality"=>'auto'))->getSecurePath();
            
          }



          if($request->imageroom2!=null){
        
    
            $path5= Cloudinary::upload($request->file('imageroom2')->getRealPath(),
            array("public_id" =>$request->name5,"quality"=>'auto'))->getSecurePath();
            
          }



          if($request->imageroom3!=null){
        
    
            $path6= Cloudinary::upload($request->file('imageroom3')->getRealPath(),
            array("public_id" =>$request->name6,"quality"=>'auto'))->getSecurePath();
            
          }

        if($request->image1!=null){

            $hotel->image1=$path1;
        }

        if($request->image2!=null){

            $hotel->image2=$path2;
        }


        if($request->image3!=null){

            $hotel->image3=$path3;
        }

        


        if($request->imageroom1!=null){

            $hotel->imageroom1=$path4;
        }

        if($request->imageroom2!=null){

            $hotel->imageroom2=$path5;
        }

        if($request->imageroom3!=null){

            $hotel->imageroom3=$path6;
        }





       $hotel->namehotel=$request->namehotel;
       $hotel->evaluation=$request->evaluation;
       $hotel->manger=$request->manger;
       $hotel->number-$request->number;
       $hotel->country=$request->country;
       $hotel->city=$request->city;
       $hotel->latitude=$request->latitude;
       $hotel->longtude=$request->longtude;
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

       $hotel->save();


       return $this->Respone($hotel,200);

    }

   
    public function destroy($id)
    {
        
        $hotel=InformHotel::find($id);

        $hotel->delete();


        return $this->Respone($hotel,200);

    }
}
