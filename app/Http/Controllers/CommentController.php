<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class CommentController extends BaseController
{
    
    public function indexx($id)
    {

        
        $hotel=comment::all()->where('comment_id',$id);

        return $this->Respone($hotel,200);
    }

   
    public function store(Request $request)
    {
        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'name',
            'content',
            'comment_id'
        ]);

        if($valdit->fails()){

            return $this->sendError('Failed input',$valdit->errors());
        }


        
      
        $hotel=comment::create($input);

        return $this->Respone($hotel,'Success input');



    }

   
    public function show(comment $comment)
    {
        //
    }

    
    public function updatee(Request $request)
    {
        
        $hotel=comment::find($request->id);



        if($request->image!=null){
        
    
            $path= Cloudinary::upload($request->file('image')->getRealPath(),
            array("public_id" =>$request->name,"quality"=>'auto'))->getSecurePath();
            
          }
       
    

        if($request->image!=null){

            $hotel->image=$path;
        }

        $hotel->name=$request->name;
        $hotel->content=$request->content;

        $hotel->save();

        return $this->Respone($hotel,200);



    }

   
    public function destroy($id)
    {
        
        $hotel=comment::find($id);

        $hotel->delete();

        return $this->Respone($hotel,200);



    }
}
