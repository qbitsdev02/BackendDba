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
            'status' => $this->status,
            'amount' => $this->amount,
             'operation_type' => [
                'id' => $this->operationType->id,
                'name' =>$this->operationType->name,
             ],
            'ownerable' =>$this->ownerable,
             'entity' => [
                'id' => $this->entity->id,
                'name' =>$this->entity->name,
            ],
            'ownerable_type' =>$this->ownerable_type,
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
