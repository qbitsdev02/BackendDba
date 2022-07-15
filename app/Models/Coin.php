<?php

namespace App\Models;
/**
 * @OA\Schema(
 *   schema="Coin",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The Coin name"
 *   ),
 *   @OA\Property(
 *       property="symbol",
 *       type="string",
 *       required={"true"},
 *       description="The Coin symbol"
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
class Coin extends Base
{

    /**
     * Relationship payment orden
     * Get the payment orden associated to the coin
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function paymentOrders()
    {
        return $this->hasMany(PaymentOrder::class);
    }
}
