<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class AnimalFormatResource extends JsonResource
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
            "owner" => $this->owner->fullName()
        ];
    }
}
