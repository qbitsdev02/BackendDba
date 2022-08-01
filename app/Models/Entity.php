<?php

namespace App\Models;

/**
 * @OA\Schema(
 *   schema="Entity",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The Entity name"
 *   ),
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"true"},
 *       description="The Entity description"
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
class Entity extends Base
{
    /**
    * Relationship payment order
    * Get the operations order associated to the entity
    * @return \Illuminate\Database\Eloquent\Relations\hasMany 
    */
    public function operationOrders()
    {
        return $this->hasMany(PaymentOrder::class);
    }
}
