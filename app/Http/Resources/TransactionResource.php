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
            'full_description'=>$this->full_description,
            'payment_order' => new PaymentOrderResource($this->paymentOrder)
        ];
    }
}
