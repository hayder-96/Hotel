<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class noty extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      //  return parent::toArray($request);

     
      return [
            
        
         'id'=>$this->id,
         'name'=>$this->name,
         'noty'=>$this->noty,
         'content'=>$this->content,
         'created_at'=>$this->created_at->format('d/m/Y H:i:s'),
         'updated_at'=>$this->updated_at->format('y/m/d H:i:s'),




         
    ];



    }
}
