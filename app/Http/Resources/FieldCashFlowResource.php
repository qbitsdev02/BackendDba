<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FieldCashFlowResource extends JsonResource
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
            'concept_id' => $this->concept_id,
            'beneficiary_id' => $this->beneficiary_id,
            'transaction_id' => $this->transaction_id,
            'field_id' => $this->field_id,
            'description' => $this->description,
            'status'=>$this->status,
            'balance' =>$this->balance,
            'user_created_id' => $this->user_created_id,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'concept' => [
                'id' => $this->concept->id,
                'name' => $this->concept->name,
            ], 
            'guide' => [
                'id'=> $this->guide_id,
                'N° guide' => $this->guide->code_runpa,
            ],
            'description' => $this->description,
            'field' => [
                'id' => $this->field->id,
                'acronym' => $this->field->acronym,
                'contract_number' => $this->field->contract_number,
                'denomination' => $this->field->denomination,
                'supervisor' => [
                    'id' => $this->field->fieldSupervisor->id,
                    'name'=>$this->field->fieldSupervisor->name,
                    'last_name'=>$this->field->fieldSupervisor->last_name,
                    'document_number'=>$this->field->fieldSupervisor->document_number,
                ],
            ],
            'beneficiary' => [
                'id' => $this->beneficiary->id,
                'name'=>$this->beneficiary->name,
                'last_name'=>$this->beneficiary->last_name,
                'document_number'=>$this->beneficiary->document_number,
            ]
        ];
    }
}
