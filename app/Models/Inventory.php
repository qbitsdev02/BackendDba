<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *   schema="Inventory",
 *   type="object",
 *   @OA\Property(
 *       property="amount",
 *       type="number",
 *       required={"true"},
 *       description="The Inventory amount"
 *   ),
 *   @OA\Property(
 *       property="movement_type",
 *       type="string",
 *       required={"true"},
 *       description="The Inventory movement_type, value example ['Entry', 'Exit']"
 *   ),
 *   @OA\Property(
 *       property="warehouse_id",
 *       type="number",
 *       required={"true"},
 *       description="The Inventory warehouse_id"
 *   ),
 *   @OA\Property(
 *       property="reason_for_transfer_id",
 *       type="number",
 *       required={"true"},
 *       description="The Inventory reason_for_transfer_id"
 *   ),
 *   @OA\Property(
 *       property="product_id",
 *       type="number",
 *       required={"true"},
 *       description="The Inventory product_id"
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
class Inventory extends Base
{
    /**
     * Get the product that owns the Inventory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    /**
     * Get the warehouse that owns the Inventory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
