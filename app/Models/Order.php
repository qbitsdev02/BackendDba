<?php

namespace App\Models;

class Order extends Base
{
    /**
     * @OA\Schema(
     *   schema="Order",
     *   type="object",
     *   @OA\Property(
     *       property="client_id",
     *       type="number",
     *       required={"true"},
     *       description="The Order client_id"
     *   ),
     *   @OA\Property(
     *       property="seller_id",
     *       type="number",
     *       required={"true"},
     *       description="The Order seller_id"
     *   ),
     *   @OA\Property(
     *       property="coin_id",
     *       type="number",
     *       required={"true"},
     *       description="The Order coin_id"
     *   ),
     *  @OA\Property(
     *       property="exchange_rate",
     *       type="string",
     *       required={"true"},
     *       description="The Order exchange_rate"
     *   ),
     *  @OA\Property(
     *       property="expiration_date",
     *       type="string",
     *       required={"true"},
     *       example="2021-03-27",
     *       description="The Order expiration_date"
     *   ),
     *  @OA\Property(
     *       property="address",
     *       type="string",
     *       required={"true"},
     *       description="The Order address"
     *   ),
     *  @OA\Property(
     *       property="observation",
     *       type="string",
     *       required={"true"},
     *       description="The Order observation"
     *   ),
     *  @OA\Property(
     *       property="payment_method_id",
     *       type="number",
     *       required={"true"},
     *       description="The Order Payment term"
     *   ),
     *  @OA\Property(
     *       property="created_at",
     *       type="string",
     *       required={"true"},
     *       example="2020-01-01 12:00:00",
     *       description="The Order date of issue"
     *   ),
     *  @OA\Property(
     *       property="delivery_date",
     *       type="string",
     *       required={"true"},
     *       example="2020-01-01",
     *       description="The Order delivery date"
     *   ),
     *  @OA\Property(
     *       property="order_details",
     *       type="array",
     *       required={"true"},
     *       @OA\Items(
     *           @OA\Property(property="product_id", type="number"),
     *           @OA\Property(property="amount", type="number"),
     *           @OA\Property(property="price", type="number"),
     *           @OA\Property(property="igv", type="number"),
     *           @OA\Property(property="purchase_price", type="number"),
     *           @OA\Property(property="user_created_id", type="number")
     *       ),
     *       description="The Order details"
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
        'client:id,name,last_name,document_number',
        'seller:id,name,last_name,document_number',
        'orderDetails'
    ];
    /**
     * Get the coin that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }
    /**
     * Get the seller that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    /**
     * Get the client that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
        /**
     * Get all of the orderDetails for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
