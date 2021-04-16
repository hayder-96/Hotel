<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class hot extends JsonResource
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
        'evaluation'=>$this->evaluation,
        'image1'=>$this->image1,
        'image2'=>$this->image2,
        'image3'=>$this->image3,
        'namehotel'=>$this->namehotel,
        'country'=>$this->country,

        'city'=>$this->city

       ];
    }
}
