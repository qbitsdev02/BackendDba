<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 *   schema="Service",
 *   type="object",
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"false"},
 *       description="The description"
 *   ),
 *   @OA\Property(
 *       property="amount",
 *       type="number",
 *       required={"true"},
 *       description="The amount"
 *   ),
 *   @OA\Property(
 *       property="payment_method_id",
 *       type="number",
 *       required={"true"},
 *       description="payment_method_id"
 *   ),
 *    @OA\Property(
 *       property="organization_id",
 *       type="number",
 *       required={"true"},
 *       description="The organization_id"
 *   ),
 *   @OA\Property(
 *       property="voucher_type_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The voucher_type_id"
 *   ),
 * @OA\Property(
 *       property="reference",
 *       type="string",
 *       required={"false"},
 *       description="The reference"
 *   ),
 * @OA\Property(
 *       property="provider_id",
 *       type="number",
 *       required={"true"},
 *       description="The provider_id"
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
 * */
class Service extends Base
{
    use HasFactory;

    /**
     * Get the paymentMethod that owns the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * Get the organization that owns the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * Get the voucherType that owns the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voucherType()
    {
        return $this->belongsTo(VoucherType::class);
    }
}
