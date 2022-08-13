<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 *
 * @OA\Schema(
 *   schema="FieldCashFlow",
 *   type="object",
 *   @OA\Property(
 *       property="amount",
 *       type="float",
 *       required={"true"},
 *       example=1000,
 *       description="The amount"
 *   ),
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"true"},
 *       description="description active"
 *   ),
 *   @OA\Property(
 *       property="concept_id",
 *       type="number",
 *       required={"false"},
 *       example=1,
 *       description="The concept"
 *   ),
 *  @OA\Property(
 *       property="field_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The field_id"
 *   ),
 *  @OA\Property(
 *       property="transaction_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The transaction_id"
 *   ),
 *  @OA\Property(
 *       property="status",
 *       type="string",
 *       required={"true"},
 *       default="approved",
 *       description="The status active"
 *   ),
 *  @OA\Property(
 *       property="beneficiary_id",
 *       type="number",
 *       required={"false"},
 *       example=1,
 *       description="The beneficiary_id"
 *   ),
 *  @OA\Property(
 *       property="balance",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The balance"
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
class FieldCashFlow extends Base
{
    use HasFactory;

    public function scopeTypeCash($query, $egress)
    {
        if (isset($egress) && !empty($egress)) {
            if ($egress === true)
                return $query->whereNull('transaction_id');
            return $query->whereNotNull('transaction_id');
        }
    }

    /**
     * Relationship
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * Relationship
     */
    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    /**
     *
     */
    public function concept()
    {
        return $this->belongsTo(Concept::class);
    }

    /**
     *
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    /**
     *
     */
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
