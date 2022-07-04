<?php

namespace App\Models;

class Client extends Base
{
    /**
     * @OA\Schema(
     *   schema="Client",
     *   type="object",
     *   @OA\Property(
     *       property="name",
     *       type="string",
     *       required={"true"},
     *       description="The user name"
     *   ),
     *   @OA\Property(
     *       property="document_number",
     *       type="string",
     *       required={"true"},
     *       description="The Clients document number"
     *   ),
     *   @OA\Property(
     *       property="email",
     *       required={"true"},
     *       type="string",
     *       description="The Clients email"
     *   ),
     *   @OA\Property(
     *       property="address",
     *       required={"true"},
     *       type="string",
     *       description="The Clients address"
     *   ),
     *   @OA\Property(
     *       property="states",
     *       required={"true"},
     *       type="array",
     *       @OA\Items(
     *           @OA\Property(property="state_id", type="number")
     *       ),
     *       description="The Clients address"
     *   ),
     *   @OA\Property(
     *       property="img",
     *       required={"true"},
     *       type="string",
     *       description="The Clients img"
     *   ),
     *   @OA\Property(
     *       property="phone_number",
     *       required={"true"},
     *       type="string",
     *       description="The Clients phone number"
     *   ),
     *   @OA\Property(
     *       property="user_created_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The Clients crete"
     *   ),
     *    @OA\Property(
     *       property="user_updated_id",
     *       type="number",
     *       required={"true"},
     *       example=1,
     *       description="The Clients update"
     *   ),
     * )
     */
    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->document_number}-{$this->name}";
    }
    /**
     * The states that belong to the MaterialSupplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function states()
    {
        return $this->belongsToMany(State::class)
          ->using(ClientState::class);
    }
}
