<?php

namespace App\Models;

class SellerCommission extends Base
{
    /**
     * @OA\Schema(
     *   schema="SellerCommission",
     *   type="object",
     *   @OA\Property(
     *       property="seller_id",
     *       type="number",
     *       required={"true"},
     *       description="The seller Commission id"
     *   ),
     *   @OA\Property(
     *       property="commission_type",
     *       type="string",
     *       required={"true"},
     *       description="The SellerCommission commission type"
     *   ),
     *   @OA\Property(
     *       property="amount",
     *       type="string",
     *       required={"true"},
     *       description="The SellerCommission amount"
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
    
    protected $with = [
        'seller:id,name,last_name'
    ];
    /**
     * Get the seller that owns the SellerCommission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
