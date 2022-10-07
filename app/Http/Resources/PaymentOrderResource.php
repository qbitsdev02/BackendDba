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
            'ownerable_type' =>$this->ownerable_type,
            'ownerable_id' =>$this->ownerable_id,
            'ownerable' =>$this->ownerable,
            'payment_date' => $this->payment_date,
            'user_created' => $this->user_created_id,
            'pending' => $this->pending,
            'operation_type_id' => $this->operation_type_id, 
            'concept_id' => $this->concept_id, 
            'entity_id' => $this->entity_id, 
            'coin_id' => $this->coin_id, 
            'operation_type' => [
                'id' => $this->operationType->id,
                'name' =>$this->operationType->name,
             ],
            'concept' => [
                'id' => $this->concept->id,
                'name' =>$this->concept->name,
             ],
            'entity' => [
                'id' => $this->entity->id,
                'name' =>$this->entity->name,
            ],
            'coin' => [
                'id' =>$this->coin->id,
                'name' =>$this->coin->name,
                'symbol' =>$this->coin->symbol
            ],
        ];
    }
}
