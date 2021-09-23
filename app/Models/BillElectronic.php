<?php

namespace App\Models;

use App\Helpers\BillSerie;

/**
 * @OA\Schema(
 *   schema="BillElectronic",
 *   type="object",
 *   @OA\Property(
 *       property="serie_id",
 *       type="number",
 *       required={"true"},
 *       description="The Bill Electronic serie_id"
 *   ),
 *   @OA\Property(
 *       property="client_id",
 *       type="number",
 *       required={"true"},
 *       description="The Bill Electronic client_id"
 *   ),
 *   @OA\Property(
 *       property="voucher_type_id",
 *       type="number",
 *       required={"true"},
 *       description="The Bill Electronic voucher_type_id"
 *   ),
 *   @OA\Property(
 *       property="branch_office_id",
 *       type="number",
 *       required={"true"},
 *       description="The Bill Electronic branch_office_id"
 *   ),
 *   @OA\Property(
 *       property="operation_type_id",
 *       type="number",
 *       required={"true"},
 *       description="The Bill Electronic operation_type_id"
 *   ),
 *   @OA\Property(
 *       property="seller_id",
 *       type="number",
 *       required={"true"},
 *       description="The Bill Electronic seller_id"
 *   ),
 *   @OA\Property(
 *       property="coin_id",
 *       type="number",
 *       required={"true"},
 *       description="The Bill Electronic coin_id"
 *   ),
 *  @OA\Property(
 *       property="exchange_rate",
 *       type="string",
 *       required={"true"},
 *       description="The Bill Electronic exchange_rate"
 *   ),
 *  @OA\Property(
 *       property="igv",
 *       type="string",
 *       required={"true"},
 *       example="12",
 *       description="The Bill Electronic igv"
 *   ),
 *  @OA\Property(
 *       property="expiration_date",
 *       type="number",
 *       required={"true"},
 *       example="2021-03-27",
 *       description="The Bill Electronic expiration_date"
 *   ),
 *  @OA\Property(
 *       property="bill_electronic_details",
 *       type="array",
 *       required={"true"},
 *       @OA\Items(
 *           @OA\Property(property="product_id", type="number"),
 *           @OA\Property(property="amount", type="number"),
 *           @OA\Property(property="price", type="number"),
 *           @OA\Property(property="discount", type="number"),
 *           @OA\Property(property="igv", type="number"),
 *           @OA\Property(property="purchase_price", type="number"),
 *           @OA\Property(property="user_created_id", type="number")
 *       ),
 *       description="The bill electronic details"
 *   ),
 *  @OA\Property(
 *       property="bill_electronic_payments",
 *       type="array",
 *       required={"true"},
 *       @OA\Items(
 *           @OA\Property(property="payment_method_id", type="number"),
 *           @OA\Property(property="payment_destination_id", type="number"),
 *           @OA\Property(property="reference", type="string"),
 *           @OA\Property(property="amount", type="string"),
 *           @OA\Property(property="user_created_id", type="number")
 *       ),
 *       description="The bill electronic payments"
 *   ),
 *  @OA\Property(
 *       property="bill_electronic_guides",
 *       type="array",
 *       required={"true"},
 *       @OA\Items(
 *           @OA\Property(property="guide_id", type="number"),
 *           @OA\Property(property="description", type="string"),
 *           @OA\Property(property="observation", type="string"),
 *           @OA\Property(property="pucharse_order", type="string"),
 *           @OA\Property(property="user_created_id", type="number")
 *       ),
 *       description="The bill electronic payments"
 *   ),
 *  @OA\Property(
 *       property="bill_fees",
 *       type="array",
 *       required={"true"},
 *       @OA\Items(
 *           @OA\Property(property="amount", type="number"),
 *           @OA\Property(property="date", type="string"),
 *           @OA\Property(property="user_created_id", type="number")
 *       ),
 *       description="The bill electronic fees"
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

class BillElectronic extends Base
{
    /**
     * The attributes that are mass with.
     *
     * @var array
     */
    protected $with = [];
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['total', 'total_igv', 'total_gravado'];

    public function setSerieIdAttribute($value)
    {
        $this->attributes['number'] = BillSerie::lastNumber($value);
        $this->attributes['serie_id'] = $value;
    }

    /**
     * Attribute total
     * @return total
     */
    public function getTotalAttribute()
    {
        return $this->total_igv + $this->total_gravado;
    }
    /**
     * Attribute total
     * @return total
     */
    public function getTotalIgvAttribute()
    {
        return $this->billElectronicDetails->sum(function($row) {
            return ((($row->amount * $row->price) * $row->igv) / 100);
        });
    }
    /**
     * Attribute total
     * @return total
     */
    public function getTotalGravadoAttribute()
    {
        return $this->billElectronicDetails->sum(function($row) {
            return $row->amount * $row->price;
        });
    }
    /**
     * Get all of the billElectronicDetails for the BillElectronic
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billElectronicDetails()
    {
        return $this->hasMany(BillElectronicDetail::class);
    }
    /**
     * Get all of the billElectronicDetails for the BillElectronic
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billElectronicGuides()
    {
        return $this->hasMany(BillElectronicGuide::class);
    }
    /**
     * Get all of the billElectronicDetails for the BillElectronic
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billElectronicPayments()
    {
        return $this->hasMany(BillElectronicPayment::class);
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
     * Get the serie that owns the BillElectronic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    /**
     * Get the seller that owns the BillElectronic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    /**
     * Get the client that owns the BillElectronic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
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

    /**
     * Get the branchOffice that owns the BillElectronic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branchOffice()
    {
        return $this->belongsTo(BranchOffice::class);
    }
    /**
     * Get the operationType that owns the BillElectronic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operationType()
    {
        return $this->belongsTo(OperationType::class);
    }

    /**
     * Get the creditNote associated with the BillElectronic
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function creditNote()
    {
        return $this->hasOne(CreditNote::class);
    }

    /**
     * Get all of the billFess for the BillElectronic
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billFess()
    {
        return $this->hasMany(BillFees::class);
    }
}
