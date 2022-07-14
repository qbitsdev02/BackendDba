<?php

namespace App\Http\Resources;

use App\Models\Active;
use Illuminate\Http\Resources\Json\JsonResource;

use function Ramsey\Uuid\v1;

class TicketRosource extends JsonResource
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
            "provider" => [
                'name' =>$this->provider->name
            ],
            "field_id" => [
                "name" => $this->field->denomination
            ],
            "guide_id" => [
                "number guide" => $this->guide->serie_number
            ],
            
            "detalles" => ActivePersonalTicketResource::collection
                ($this->activePersonalTickes),
                
            "tare_weight" => $this->tare_weight,
            "gross_weight" => $this->gross_weight,
            "tare" => $this->tare,
            "vehicle_number" => $this->vehicle_number,
            "certificate" => $this->certificate,
            "start_date" => $this->start_date,
            "final_date" => $this->final_date,
            "checkweighing" => $this->checkweighing,
            "client_id" => [
                "name" =>$this->client->name 
            ],
            "user_created_id" => $this->user_created_id,

        ];
    }
}
