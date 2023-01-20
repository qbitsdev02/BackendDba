<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuideResource extends JsonResource
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
            'id' => $this->id,
            'organization_id' => $this->organization_id,
            'vehicle_id' => $this->vehicle_id,
            'client_id' => $this->client_id,
            'trailer_id' => $this->trailer_id,
            'serie_number' => $this->serie_number,
            'start_date' => $this->start_date,
            'deadline' => $this->deadline,
            'origin_address' => $this->origin_address,
            'destination_address' => $this->destination_address,
            'material' => $this->material,
            'driver_id' => $this->driver_id,
            'user_created_id' => $this->user_created_id,
            'unit_of_measurement_id' => $this->unit_of_measurement_id,
            'weight' => $this->weight,
            'organization' => $this->organization,
            'status' => $this->status,
            'vehicle' => new ActiveResource($this->vehicle),
            'client' => $this->client,
            'trailer' => new ActiveResource($this->trailer),
            'driver' => $this->driver,
            'images' => $this->images,
            'logo' => $this->logo,
            'seal' => $this->seal,
            'signature' => $this->signature,
            'unit_of_measurement' => $this->unitOfMeasurement,
            'guide_owner' => $this->guideOwner ? [
                'id' => $this->guideOwner->id,
                'ownerable_type' => $this->guideOwner->ownerable_type,
                'ownerable_id' => $this->guideOwner->ownerable_id,
                'responsable_type' => $this->guideOwner->responsable_type,
                'responsable_id' => $this->guideOwner->responsable_id,
                'ownerable' => $this->guideOwner->ownerable,
                'responsable' => $this->guideOwner->responsable
            ] : null,
            'created_at' => $this->created_at
        ];
    }
}
