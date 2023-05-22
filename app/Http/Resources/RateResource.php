<?php

namespace App\Http\Resources;

use App\Models\Coin;
use App\Models\Provider;
use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
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
            'rate' => $this->rate,
            'description' => $this->description,
            'provider' => [
                'id' => $this->provider->id,
                'name' => $this->provider->name 
            ], 
            'coin' => [
                'id' => $this->coin->id,
                'name' => $this->coin->name,
                'symbol' => $this->coin->symbol
            ],
            'unit_of_measurement' => [
                'id' => $this->unitOfMeasurement->id,
                'name' => $this->unitOfMeasurement->name,
                'acronym' => $this->unitOfMeasurement->acronym
            ],
        ];
    }
}
