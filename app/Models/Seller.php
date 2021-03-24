<?php

namespace App\Models;
/**
 * @OA\Schema(
 *   schema="Seller",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The seller name"
 *   ),
 *   @OA\Property(
 *       property="last_name",
 *       type="string",
 *       required={"true"},
 *       description="The seller last_name"
 *   ),
 *   @OA\Property(
 *       property="phone",
 *       type="string",
 *       required={"false"},
 *       description="The seller phone"
 *   ),
 *   @OA\Property(
 *       property="document_type_id",
 *       type="number",
 *       required={"false"},
 *       description="The document document type"
 *   ),
 *   @OA\Property(
 *       property="document_number",
 *       type="string",
 *       required={"false"},
 *       description="The document number"
 *   ),
 *   @OA\Property(
 *       property="email",
 *       required={"true"},
 *       type="string",
 *       description="The seller email"
 *   ),
 *   @OA\Property(
 *       property="user_created_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The user crete"
 *   ),
 *    @OA\Property(
 *       property="user_updated_id",
 *       type="number",
 *       required={"true"},
 *       example=1,
 *       description="The user update"
 *   ),
 * )
 */
class Seller extends User
{
    protected $table = 'users';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'client_type_id',
        'phone_contact',
        'full_name_contact'
    ];
}
