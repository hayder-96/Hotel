<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class hotelcon extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);

       return[
           'id'=>$this->id,
       'namehotel'=>$this->namehotel,
       'evaluation'=>$this->evaluation,
       'image1'=>$this->image1,
       'image2'=>$this->image2,
       'image3'=>$this->image3,
       'manger'=>$this->manger,
       'number'=>$this->number,
       'country'=>$this->country,
       'city'=>$this->city,
       'latitude'=>$this->latitude,
       'longtude'=>$this->longtude,
       'admin_id'=>$this->admin_id,
       'email'=>$this->email,
       'ev'=>$this->ev,
       'enable'=>$this->enable,
       'created_at'=>$this->created_at->format('d/m/Y H:i:s'),
       'updated_at'=>$this->updated_at->format('y/m/d H:i:s'),
       ];
    }
}
