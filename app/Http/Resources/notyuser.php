<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class notyuser extends JsonResource
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
            
        
        'content'=>$this->content,
        'user_id'=>$this->user_id,
        'namehotel'=>$this->namehotel,
        'noty'=>$this->noty

        
   ];
    }
}