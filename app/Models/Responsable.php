<?php

namespace App\Models;

/**
 * @OA\Schema(
 *   schema="Responsable",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The Responsable name"
 *   ),
 *   @OA\Property(
 *       property="last_name",
 *       type="string",
 *       required={"true"},
 *       description="The Responsable last_name"
 *   ),
 *   @OA\Property(
 *       property="document_number",
 *       type="string",
 *       required={"true"},
 *       description="The Responsable document_number"
 *   ),
 *   @OA\Property(
 *       property="email",
 *       type="string",
 *       required={"true"},
 *       description="The Responsable email"
 *   ),
 *   @OA\Property(
 *       property="phone_number",
 *       type="string",
 *       required={"true"},
 *       description="The Responsable phone_number"
 *   ),
 *   @OA\Property(
 *       property="user_created_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The Responsable crete"
 *   ),
 *   @OA\Property(
 *       property="beneficiary_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The Responsable beneficiary"
 *   ),
 *    @OA\Property(
 *       property="user_updated_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The Responsable update"
 *   ),
 * )
 */
class Responsable extends User
{
    protected $table = 'users';

    /**
     * Get the beneficiary that owns the Responsable
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
