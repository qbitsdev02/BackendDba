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
            // "provider" => [
            //     'id' => $this->provider->id,
            //     'name' =>$this->provider->name
            // ],
            // "field" => [
            //     "id" => $this->field->id,
            //     "name" => $this->field->denomination
            // ],
            "guide" => [
                'id' =>$this->guide->id,
                "number_guide" => $this->id,
                "driver" => $this->guide->driver
            ],
            "penalty" => $this->penalty,
            "checkweighing" => $this->checkweighing,
            "net_weight" => $this->gross_weight - $this->tare_weight,

            "detalles" => ActivePersonalTicketResource::collection($this->activePersonalTickes),

            "tare_weight" => $this->tare_weight,
            "gross_weight" => $this->gross_weight,
            // "tare" => $this->tare,
            // "vehicle_number" => $this->vehicle_number,
            // "certificate" => $this->certificate,
            "start_date" => $this->start_date,
            "final_date" => $this->final_date,
            // "checkweighing" => $this->checkweighing,
            "client" => [
                "id" =>$this->client->id ,
                "name" =>$this->client->name
            ],
            "created_at" => $this->created_at,
            "final_date" => $this->final_date,
            "final_time" => $this->final_time,
            "user_created_id" => $this->user_created_id,

        ];
    }
}
