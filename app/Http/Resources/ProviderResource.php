<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'seal' => $this->seal,
            'logo' => $this->logo,
            'serie_numbre' => $this->serie_number,
            'signature' => $this->signature,
            'name' => $this->name,
            'document_number' => $this->document_number,
            'address' => $this->address,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'provider_types' => ProviderTypeResource::collection($this->providerTypes),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
