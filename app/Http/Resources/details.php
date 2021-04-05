<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class details extends JsonResource
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

       return [
           'id'=>$this->id,
        'typeroom'=>$this->typeroom,
        'nameroom'=>$this->nameroom,
        'priceroom'=>$this->priceroom,
        'typebed'=>$this->typebed,
        'numbed'=>$this->numbed,
        'numguest'=>$this->numguest,
        'Facilities'=>$this->Facilities,
        'meansofcomfort'=>$this->meansofcomfort,
        'kids'=>$this->kids,
        'animals'=>$this->animals,
        'access'=>$this->access,
        'breckfast'=>$this->breckfast,
        'details_id'=>$this->details_id,
        'numroom'=>$this->numroom,
        'imageroom1'=>$this->imageroom1,
        'imageroom2'=>$this->imageroom2,
        'imageroom3'=>$this->imageroom3
        
       
         
    ];
    }
}
