<?php

namespace App\Models;

/**
 * @OA\Schema(
 *   schema="Vehicle",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The Vehicle name"
 *   ),
 *   @OA\Property(
 *       property="brand",
 *       type="string",
 *       required={"true"},
 *       description="The Vehicle brand"
 *   ),
 *   @OA\Property(
 *       property="model",
 *       type="string",
 *       required={"true"},
 *       description="The Vehicle model"
 *   ),
 *   @OA\Property(
 *       property="plate",
 *       type="string",
 *       required={"true"},
 *       description="The Vehicle plate"
 *   ),
 *    @OA\Property(
 *       property="ownerable_type",
 *       type="string",
 *       required={"true"},
 *       example="App\Models\MaterialSupplier",
 *       description="The Vehicle ownerable_type"
 *   ),
 *   @OA\Property(
 *       property="ownerable_id",
 *       type="number",
 *       required={"true"},
 *       description="The Vehicle ownerable_id"
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
class Vehicle extends Base
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
