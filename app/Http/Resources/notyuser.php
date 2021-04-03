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
            
        'id'=>$this->id,
        'content'=>$this->content,
        'user_id'=>$this->user_id,
        'namehotel'=>$this->namehotel,
        'noty'=>$this->noty,
        'created_at'=>$this->created_at->format('d/m/Y H:M:s'),
        'updated_at'=>$this->updated_at->format('y/m/d H:M:s'),

    
   ];
    }
}
