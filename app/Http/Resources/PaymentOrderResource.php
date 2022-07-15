<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentOrderResource extends JsonResource
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
            'description' => $this->description,
            'amount' => $this->amount,
             'operation_type' => [
                'id' => $this->operationType->id,
                'name' =>$this->operationType->name,
             ],
            'ticket' => $this->ticket_id ?  [
                'id' => $this->ticket_id,
                'tare weight' => $this->ticket->tare_weight,
                'gross weight' => $this->ticket->gross_weight,
            ] : null,
             'entity' => [
                'id' => $this->entity->id,
                'name' =>$this->entity->name,
            ],
            'coin' => [
                'id' =>$this->coin->id,
                'name' =>$this->coin->name,
                'symbol' =>$this->coin->symbol
            ],
            'payment_date' => $this->payment_date,
            'user_created' => $this->user_created_id,
        ];
    }
}
