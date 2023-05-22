<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DisbursementResource extends JsonResource
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
            'from_branch_office_id' => $this->from_branch_office_id,
            'to_from_branch_office_id' => $this->to_branch_office_id,
            'amount' => $this->amount,
            'user_created_id' => $this->user_created_id,
        ];
    }
}
