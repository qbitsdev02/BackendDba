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
            'ownerable_type' => $this->ownerable_type,
            'ownerable_id' => $this->ownerable_id,
            'ownerable' => $this->ownerable,
            'payment_date' => $this->payment_date,
            'user_created' => $this->user_created_id,
            'pending' => $this->pending,
            'payment_method_id' => $this->payment_method_id,
            'chart_of_account_id' => $this->chart_of_account_id,
            'branch_office_id' => $this->branch_office_id,
            'organization_id' => $this->organization_id,
            'coin_id' => $this->coin_id,
            // 'concept' => [
            //     'id' => $this->concept->id,
            //     'name' => $this->concept->name,
            // ],
            'chart_of_account' => $this->chartOfAccount,
            'coin' => [
                'id' => $this->coin->id,
                'name' => $this->coin->name,
                'symbol' => $this->coin->symbol
            ],
            'payment_method_attributes' => $this->paymentMethodAttributes,
            'bank' => $this->bank,
            'bank_reference' => $this->bank_reference,
            'correlative' => $this->correlative,
        ];
    }
}
