<?php

namespace App\Models;

/**
 * @OA\Schema(
 *   schema="PaymentMethod",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The OperationType name"
 *   ),
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"true"},
 *       description="The OperationType description"
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
class  PaymentMethod extends Base
{
    /**
     * Relationship payment order
     * Get the operations order associated to the operation type
     * @return \Illuminate\Database\Eloquent\Relations\hasMany 
     */
    public function operationOrders()
    {
        return $this->hasMany(PaymentOrder::class);
    }

    /**
     * Get all of the services for the PaymentMethod
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
