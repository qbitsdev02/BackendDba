<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 * @OA\Schema(
 *   schema="Transaction",
 *   type="object",
 *   @OA\Property(
 *       property="amount",
 *       type="number",
 *       required={"true"},
 *       description="The number transaction"
 *   ),
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"true"},
 *       default="active",
 *       description="The description transaction"
 *   ),
 *   @OA\Property(
 *       property="date",
 *       type="string",
 *       required={"true"},
 *       description="date transaction"
 *   ),
 *   @OA\Property(
 *       property="reference",
 *       type="string",
 *       required={"true"},
 *       description="reference transaction"
 *   ),
 *  *   @OA\Property(
 *       property="beneficiary_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The beneficiary_id "
 *   ),
 *   @OA\Property(
 *       property="payment_order_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The payment_order_id "
 *   ),
 *  @OA\Property(
 *       property="concept_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The concept_id"
 *   ),
 * 
 *   @OA\Property(
 *       property="user_created_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The Users crete"
 *   ),
 * )
 */
class Transaction extends Base
{
    use HasFactory;


    /**
     * Relationship payment order
     */
    public function paymentOrder()
    {
        return $this->belongsTo(PaymentOrder::class);
    }

    /**
     * Relationship 
     */
    public function concept()
    {
        return $this->belongsTo(Concept::class);
    }

    /***
     * 
     */
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }

    /**
     * 
     */
    public function fieldCashFlow()
    {
        return $this->belongsTo(FieldCashFlow::class);
    }

    public function getFullDescriptionAttribute()
    {
        return $this->paymentOrder->concept->conceptType->category->name . ', ' .
            $this->paymentOrder->concept->conceptType->name . ', ' .
            $this->paymentOrder->concept->name . ', ' . $this->description;
    }
}
