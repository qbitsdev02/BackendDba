<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonalResource extends JsonResource
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
            'id' =>$this->id,
            "name" => $this->name, 
            "last_name" => $this->last_name,
            "document_number" => $this->document_number,
            "ownerable" => [
                'name' => $this->ownerable->name,
                'email' => $this->ownerable->email,
                'document_number' => $this->ownerable->document_number,
                'phone_number' => $this->ownerable->phone_number,
            ],
            "staff_type_id" => new StaffTypeResource($this->staffType),
            "user_id" => $this->user_id,
        ];
    }
}