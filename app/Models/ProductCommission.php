<?php

namespace App\Models;
class ProductCommission extends Base
{
    /**
     * @OA\Schema(
     *   schema="ProductCommission",
     *   type="object",
     *   @OA\Property(
     *       property="product_id",
     *       type="number",
     *       required={"true"},
     *       description="The Product Commission id"
     *   ),
     *   @OA\Property(
     *       property="commission_type",
     *       type="string",
     *       required={"true"},
     *       description="The ProductCommission commission type"
     *   ),
     *   @OA\Property(
     *       property="amount",
     *       type="string",
     *       required={"true"},
     *       description="The ProductCommission amount"
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

    protected $guarded = [];

    protected $with = [
        'product:id,name'
    ];
    /**
     * Get the product that owns the ProductCommission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
