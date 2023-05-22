<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DisbursementRequestResource extends JsonResource
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
            'coin_id' => $this->coin_id,
            'request_branch_office_id' => $this->request_branch_office_id,
            'amount' => $this->amount,
            'user_created_id' => $this->user_created_id,
        ];
    }
}
