<?php

namespace App\Http\Controllers;

use App\Models\InformHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\noty;
use App\Models\reservation;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class InformHotelController extends BaseController
{
   

    
    public function index()
    {
        
        $hotel=InformHotel::all()->where('admin_id',Auth::id());
        return $this->Respone($hotel,200);
    }

  
    public function indexxx($id)
    {
        
        $hotel=reservation::all()->where('admin_id',$id);
        return $this->Respone($hotel,200);


    }



    public function getnoty()
    {
        
        $hotel=reservation::all()->where('noty','yes')->where('admin_id',Auth::id());
        return $this->Respone(noty::collection($hotel),200);


    }



    public function update(Request $request,$id)
    {

        $hotel=reservation::find($id);

        $hotel->noty=$request->noty;
        $hotel->save();
        return $this->Respone($hotel,200);
        
    }





    public function deletenoty($id)
    {
        
       

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
            'email'
           
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
            


        


            $input['image1']=$path1;
            $input['image2']=$path2;
            $input['image3']=$path3;
           
       
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



          

        if($request->image1!=null){

            $hotel->image1=$path1;
        }

        if($request->image2!=null){

            $hotel->image2=$path2;
        }


        if($request->image3!=null){

            $hotel->image3=$path3;
        }

        


      

       $hotel->namehotel=$request->namehotel;
       $hotel->evaluation=$request->evaluation;
       $hotel->manger=$request->manger;
       $hotel->number-$request->number;
       $hotel->country=$request->country;
       $hotel->city=$request->city;
       $hotel->latitude=$request->latitude;
       $hotel->longtude=$request->longtude;
    

       $hotel->save();


       return $this->Respone($hotel,200);

    }

   
    public function destroy($id)
    {
        
        $hotel=InformHotel::find($id);

        $hotel->delete();


        return $this->Respone($hotel,200);

    }



    public function upev(Request $request){

        $hotel=InformHotel::find($request->id);

        $hotel->ev=$request->ev;
        $hotel->save();

        return $this->Respone($hotel,200);


    }
}
