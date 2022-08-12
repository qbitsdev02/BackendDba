<?php

namespace App\Models;

/**
 * @OA\Schema(
 *   schema="Beneficiary",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The Beneficiary name"
 *   ),
 *   @OA\Property(
 *       property="last_name",
 *       type="string",
 *       required={"true"},
 *       description="The Beneficiary last_name"
 *   ),
 *   @OA\Property(
 *       property="document_number",
 *       type="string",
 *       required={"true"},
 *       description="The Beneficiary document_number"
 *   ),
 *   @OA\Property(
 *       property="email",
 *       type="string",
 *       required={"true"},
 *       description="The Beneficiary email"
 *   ),
 *   @OA\Property(
 *       property="phone_number",
 *       type="string",
 *       required={"true"},
 *       description="The Beneficiary phone_number"
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
class Beneficiary extends User {

    protected $table = 'users';


    /**
     * 
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
