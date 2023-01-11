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
            'provider_id' => $this->provider_id,
            'vehicle_id' => $this->vehicle_id,
            'client_id' => $this->client_id,
            'trailer_id' => $this->trailer_id,
            'start_date' => $this->start_date,
            'deadline' => $this->deadline,
            'origin_address' => $this->origin_address,
            'destination_address' => $this->destination_address,
            'material' => $this->material,
            'driver_id' => $this->driver_id,
            'user_created_id' => $this->user_created_id,
            'unit_of_measurement_id' => $this->unit_of_measurement_id,
            'weight' => $this->weight,
            'provider' => $this->provider,
            'status' => $this->status,
            'vehicle' => new ActiveResource($this->vehicle),
            'client' => $this->client,
            'trailer' => new ActiveResource($this->trailer),
            'driver' => $this->driver,
            'images' => $this->images,
            'unit_of_measurement' => $this->unitOfMeasurement
        ];
    }
}
