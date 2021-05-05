<?php

namespace App\Models;
/**
 * @OA\Schema(
 *   schema="Purchase",
 *   type="object",
 *   @OA\Property(
 *       property="serie",
 *       type="string",
 *       required={"true"},
 *       description="The Purchase serie"
 *   ),
 *   @OA\Property(
 *       property="number",
 *       type="string",
 *       required={"true"},
 *       description="The Purchase number"
 *   ),
 *   @OA\Property(
 *       property="provider_id",
 *       type="number",
 *       required={"true"},
 *       description="The Purchase provider_id"
 *   ),
 *   @OA\Property(
 *       property="voucher_type_id",
 *       type="number",
 *       required={"true"},
 *       description="The Purchase voucher_type_id"
 *   ),
 *   @OA\Property(
 *       property="operation_type_id",
 *       type="number",
 *       required={"true"},
 *       description="The Purchase operation_type_id"
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
 *       property="coin_id",
 *       type="number",
 *       required={"true"},
 *       description="The Purchase coin_id"
 *   ),
 *  @OA\Property(
 *       property="purchase_details",
 *       type="array",
 *       required={"true"},
 *       @OA\Items(
 *           @OA\Property(property="product_id", type="number"),
 *           @OA\Property(property="warehouse_id", type="number"),
 *           @OA\Property(property="amount", type="number"),
 *           @OA\Property(property="sale_price", type="number"),
 *           @OA\Property(property="purchase_price", type="number"),
 *           @OA\Property(property="discount", type="number"),
 *           @OA\Property(property="igv", type="number"),
 *           @OA\Property(property="user_created_id", type="number")
 *       ),
 *       description="The Purchase details"
 *   ),
 *  @OA\Property(
 *       property="purchase_payments",
 *       type="array",
 *       required={"true"},
 *       @OA\Items(
 *           @OA\Property(property="payment_method_id", type="number"),
 *           @OA\Property(property="payment_destination_id", type="number"),
 *           @OA\Property(property="reference", type="string"),
 *           @OA\Property(property="amount", type="string"),
 *           @OA\Property(property="user_created_id", type="number")
 *       ),
 *       description="The Purchase payments"
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
class Purchase extends Base
{
    /**
     * The attributes that are mass with.
     *
     * @var array
     */
    protected $with = [
        'coin:id,name',
        'provider:id,name,last_name',
        'voucherType:id,name',
        'purchasePayments',
        'purchaseDetails.product:id,name'
    ];
    /**
     * Get all of the purchaseDetails for the Purchase
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
    /**
     * Get all of the purchasePayments for the Purchase
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchasePayments()
    {
        return $this->hasMany(PurchasePayment::class);
    }
    /**
     * Get the coin that owns the BillElectronic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }

    /**
     * Get the provider that owns the BillElectronic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    /**
     * Get the voucherType that owns the BillElectronic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voucherType()
    {
        return $this->belongsTo(VoucherType::class);
    }
}
