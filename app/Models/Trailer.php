<?php

namespace App\Models;

/**
 * @OA\Schema(
 *   schema="Trailer",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The Trailer name"
 *   ),
 *   @OA\Property(
 *       property="brand",
 *       type="string",
 *       required={"true"},
 *       description="The Trailer brand"
 *   ),
 *   @OA\Property(
 *       property="model",
 *       type="string",
 *       required={"true"},
 *       description="The Trailer model"
 *   ),
 *   @OA\Property(
 *       property="plate",
 *       type="string",
 *       required={"true"},
 *       description="The Trailer plate"
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
 *       description="The Users crete"
 *   ),
 *    @OA\Property(
 *       property="user_updated_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The Users update"
 *   ),
 * )
 */
class Trailer extends Base
{
    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->plate}-{$this->brand}";
    }
    public function ownerable()
    {
        return $this->morphTo();
    }
}
