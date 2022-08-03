<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActiveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id, 
            "name" => $this->name, 
            "description" => $this->description,
            "status" => $this->status,
            "ownerable" => [
                'id' => $this->ownerable->id,
                'name' => $this->ownerable->name,
            ],
            "attribute" => ActiveAttributeResource::collection($this->attributes),
        ];
    }
}
