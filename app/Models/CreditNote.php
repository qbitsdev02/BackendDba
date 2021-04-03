<?php

namespace App\Models;
class CreditNote extends Base
{
    /**
     * @OA\Schema(
     *   schema="CreditNote",
     *   type="object",
     *   @OA\Property(
     *       property="seller_id",
     *       type="number",
     *       required={"true"},
     *       description="The Credit Note seller_id"
     *   ),
     *   @OA\Property(
     *       property="voucher_type_note_id",
     *       type="number",
     *       required={"true"},
     *       description="The Credit Note voucher_type_note_id"
     *   ),
     *   @OA\Property(
     *       property="type_of_credit_note_id",
     *       type="number",
     *       required={"true"},
     *       description="The Credit Note type_of_credit_note_id"
     *   ),
     *   @OA\Property(
     *       property="description",
     *       type="number",
     *       required={"true"},
     *       description="The Credit Note description"
     *   ),
     *   @OA\Property(
     *       property="purchase_order",
     *       type="number",
     *       required={"true"},
     *       description="The Credit Note purchase_order"
     *   ),
     *  @OA\Property(
     *       property="exchange_rate",
     *       type="string",
     *       required={"true"},
     *       description="The Credit Note exchange_rate"
     *   ),
     *  @OA\Property(
     *       property="credit_note_details",
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
     *       description="The Credit Note details"
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
        'creditNoteDetails.product:id,code,name,description',
        'typeOfCreditNote:id,name',
        'voucherTypeNote:id,name'
    ];
    /**
     * Get the VoucherTypeNote that owns the CreditNote
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voucherTypeNote()
    {
        return $this->belongsTo(VoucherTypeNote::class);
    }
    /**
     * Get the VoucherTypeNote that owns the CreditNote
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeOfCreditNote()
    {
        return $this->belongsTo(TypeOfCreditNote::class);
    }
    /**
     * Get all of the creditNoteDetails for the CreditNote
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creditNoteDetails()
    {
        return $this->hasMany(CreditNoteDetail::class);
    }
}
