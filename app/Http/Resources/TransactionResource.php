<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'amount' => $this->amount,
            'description' => $this->description,
            'date' => $this->date,
            'reference' => $this->reference,
            'beneficiary_id'=>$this->beneficiary_id,
            'concept' => [
                'id' =>$this->concept->id,
                'name' => $this->concept->name
            ],
            'payment_order_id' => new PaymentOrderResource($this->paymentOrder),
            

        ];
    }
}
