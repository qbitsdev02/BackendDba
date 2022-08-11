<?php

namespace App\Http\Resources;

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
            'concept_id' => $this->concept_id ? [
                'id' => $this->concept->id,
                'name' => $this->concept->name
            ] : NULL, 
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
            'status'=>$this->status,
            'balance' =>$this->balance,
            'beneficiary_id' => $this->beneficiary_id ?[
                    $this->user_created_id
                ] : NULL ,
            'user_created_id' => $this->user_created_id,
        ];
    }
}
