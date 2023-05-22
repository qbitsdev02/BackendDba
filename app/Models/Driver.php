<?php

namespace App\Models;

class Driver extends Base
{
    /**
     * @OA\Schema(
     *   schema="Driver",
     *   type="object",
     *   @OA\Property(
     *       property="name",
     *       type="string",
     *       required={"true"},
     *       description="The user name"
     *   ),
     *   @OA\Property(
     *       property="last_name",
     *       type="string",
     *       required={"true"},
     *       description="The Drivers password"
     *   ),
     *   @OA\Property(
     *       property="email",
     *       required={"true"},
     *       type="string",
     *       description="The Drivers email"
     *   ),
     *   @OA\Property(
     *       property="document_number",
     *       required={"true"},
     *       type="string",
     *       description="The Drivers document number"
     *   ),
     *   @OA\Property(
     *       property="phone_number",
     *       required={"true"},
     *       type="string",
     *       description="The Drivers phone number"
     *   ),
     *   @OA\Property(
     *       property="ownerable_type",
     *       type="string",
     *       required={"true"},
     *       example="App\Models\MaterialSupplier",
     *       description="The Trailer ownerable_type"
     *   ),
     *   @OA\Property(
     *       property="ownerable_id",
     *       type="number",
     *       required={"true"},
     *       description="The Trailer ownerable_id"
     *   ),
     *   @OA\Property(
     *       property="user_created_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The Drivers crete"
     *   ),
     *    @OA\Property(
     *       property="user_updated_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The Drivers update"
     *   ),
     * )
     */
    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->document_number}-{$this->name}";
    }

    public function ownerable()
    {
        return $this->morphTo();
    }
}
