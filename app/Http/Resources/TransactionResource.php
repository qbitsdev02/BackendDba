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
            'transactionable_type' => $this->transactionable_type,
            'transactionable_id' => $this->transactionable_id,
            'concept_id' => $this->concept_id,
            'branch_office_id' => $this->branch_office_id,
            'date' => $this->date,
            'reference' => $this->reference,
            'responsable_id' => $this->responsable_id,
            'full_description' => $this->full_description,
            'payment_order' => new PaymentOrderResource($this->paymentOrder)
        ];
    }
}
