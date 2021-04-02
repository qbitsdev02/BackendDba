<?php

namespace App\Models;

class Quotation extends Base
{
    /**
     * @OA\Schema(
     *   schema="Quotation",
     *   type="object",
     *   @OA\Property(
     *       property="client_id",
     *       type="number",
     *       required={"true"},
     *       description="The Quotation client_id"
     *   ),
     *   @OA\Property(
     *       property="seller_id",
     *       type="number",
     *       required={"true"},
     *       description="The Quotation seller_id"
     *   ),
     *   @OA\Property(
     *       property="coin_id",
     *       type="number",
     *       required={"true"},
     *       description="The Quotation coin_id"
     *   ),
     *  @OA\Property(
     *       property="exchange_rate",
     *       type="string",
     *       required={"true"},
     *       description="The Quotation exchange_rate"
     *   ),
     *  @OA\Property(
     *       property="igv",
     *       type="string",
     *       required={"true"},
     *       example="12",
     *       description="The Quotation igv"
     *   ),
     *  @OA\Property(
     *       property="expiration_date",
     *       type="string",
     *       required={"true"},
     *       example="2021-03-27",
     *       description="The Quotation expiration_date"
     *   ),
     *  @OA\Property(
     *       property="validity_time",
     *       type="string",
     *       required={"true"},
     *       description="The Quotation validity time"
     *   ),
     *  @OA\Property(
     *       property="delivery_time",
     *       type="string",
     *       required={"true"},
     *       description="The Quotation delivery time"
     *   ),
     *  @OA\Property(
     *       property="shipping_address",
     *       type="string",
     *       required={"true"},
     *       description="The Quotation shipping address"
     *   ),
     *  @OA\Property(
     *       property="payment_method_id",
     *       type="number",
     *       required={"true"},
     *       description="The Quotation Payment term"
     *   ),
     *  @OA\Property(
     *       property="account_number",
     *       type="string",
     *       required={"true"},
     *       description="The Quotation account number"
     *   ),
     *  @OA\Property(
     *       property="quotation_details",
     *       type="array",
     *       required={"true"},
     *       @OA\Items(
     *           @OA\Property(property="product_id", type="number"),
     *           @OA\Property(property="amount", type="number"),
     *           @OA\Property(property="price", type="number"),
     *           @OA\Property(property="igv", type="number"),
     *           @OA\Property(property="purchase_price", type="number"),
     *           @OA\Property(property="extra_attribute", type="string"),
     *           @OA\Property(property="extra_attribute_description", type="string"),
     *           @OA\Property(property="user_created_id", type="number")
     *       ),
     *       description="The Quotation details"
     *   ),
     *  @OA\Property(
     *       property="quotation_payments",
     *       type="array",
     *       required={"true"},
     *       @OA\Items(
     *           @OA\Property(property="payment_method_id", type="number"),
     *           @OA\Property(property="payment_destination_id", type="number"),
     *           @OA\Property(property="reference", type="string"),
     *           @OA\Property(property="amount", type="string"),
     *           @OA\Property(property="user_created_id", type="number")
     *       ),
     *       description="The Quotation payments"
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
    /**
     * The attributes that are mass with.
     *
     * @var array
     */
    protected $with = [
        'coin:id,name',
        'client:id,name,last_name',
        'seller:id,name,last_name',
        'quotationPayments',
        'quotationDetails'
    ];
    /**
     * Get the coin that owns the Quotation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }   
    /**
     * Get the seller that owns the Quotation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
        
    /**
     * Get the client that owns the Quotation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    /**
     * Get all of the quotationPayments for the Quotation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotationPayments()
    {
        return $this->hasMany(QuotationPayment::class);
    }
    /**
     * Get all of the quotationDetails for the Quotation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotationDetails()
    {
        return $this->hasMany(QuotationDetail::class);
    }
}
