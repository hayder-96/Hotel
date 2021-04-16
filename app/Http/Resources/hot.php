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

        'namehotel'=>$this->namehotel,
        'country'=>$this->country,

        'city'=>$this->city

       ];
    }
}
