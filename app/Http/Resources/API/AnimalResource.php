<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "type" => $this->type,
            "date_of_birth" => $this->date_of_birth,
            "weight" => $this->weight,
            "height" => $this->height,
            "biteyness" => $this->biteyness,            
            "treatments" => $this->treatments->pluck("name"), // pluck the name property of each treatment
            "owner" => $this->owner->fullName()            
        ];
    }
}
