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
            "full_name" => "{$this->document_number} - {$this->name} {$this->last_name}",
            "staff_type" => $this->staff_type_id,
            "phone_number" => $this->phone_number,
            "images" => $this->images,
            "ownerable_type" => $this->ownerable_type,
            "ownerable_id" => $this->ownerable_id,
            "ownerable" => [
                'name' => $this->ownerable->name,
                'email' => $this->ownerable->email,
                'document_number' => $this->ownerable->document_number,
                'phone_number' => $this->ownerable->phone_number,
            ],
            "staff_type" => new StaffTypeResource($this->staffType),
            "user_id" => $this->user_id
        ];
    }
}
