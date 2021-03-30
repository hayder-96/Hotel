<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class hotel extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            
        
            'id'=>$this->id,
            'name'=>$this->name,
             'content'=>$this->content,
             'evaluation'=>$this->evaluation,

             
        ];
    }
}
