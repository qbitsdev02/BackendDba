<?php

namespace App\Models;
/**
 * @OA\Schema(
 *   schema="PurchaseOrder",
 *   type="object",
 *   @OA\Property(
 *       property="payment_method_id",
 *       type="number",
 *       required={"true"},
 *       description="The Purchase serie"
 *   ),
 *   @OA\Property(
 *       property="provider_id",
 *       type="number",
 *       required={"true"},
 *       description="The Purchase provider_id"
 *   ),
 *   @OA\Property(
 *       property="coin_id",
 *       type="number",
 *       required={"true"},
 *       description="The Purchase coin_id"
 *   ),
 *  @OA\Property(
 *       property="exchange_rate",
 *       type="string",
 *       required={"true"},
 *       description="The Purchase exchange_rate"
 *   ),
 *  @OA\Property(
 *       property="igv",
 *       type="string",
 *       required={"true"},
 *       example="12",
 *       description="The Purchase igv"
 *   ),
 *  @OA\Property(
 *       property="expiration_date",
 *       type="string",
 *       required={"true"},
 *       example="2021-03-27",
 *       description="The Purchase expiration_date"
 *   ),
 *  @OA\Property(
 *       property="purchase_order_details",
 *       type="array",
 *       required={"true"},
 *       @OA\Items(
 *           @OA\Property(property="product_id", type="number"),
 *           @OA\Property(property="warehouse_id", type="number"),
 *           @OA\Property(property="amount", type="number"),
 *           @OA\Property(property="price", type="number"),
 *           @OA\Property(property="purchase_price", type="number"),
 *           @OA\Property(property="igv", type="number"),
 *           @OA\Property(property="user_created_id", type="number")
 *       ),
 *       description="The Purchase details"
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
 *    @OA\Property(
 *       property="created_at",
 *       type="string",
 *       required={"true"},
 *       example="2020-01-01 12:00:00",
 *       description="date of issue"
 *   ),
 * )
 */
class PurchaseOrder extends Base
{
    /**
     * Get all of the purchaseDetails for the Purchase
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseOrderDetails()
    {
        return $this->hasMany(PurchaseOrderDetail::class);
    }

    /**
     * Get the provider that owns the PurchaseOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
