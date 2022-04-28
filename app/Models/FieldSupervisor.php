<?php

namespace App\Models;

/**
 * @OA\Schema(
 *   schema="FieldSupervisor",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The FieldSupervisor name"
 *   ),
 *   @OA\Property(
 *       property="last_name",
 *       type="string",
 *       required={"true"},
 *       description="The FieldSupervisor last_name"
 *   ),
 *   @OA\Property(
 *       property="document_number",
 *       type="string",
 *       required={"true"},
 *       description="The FieldSupervisor document_number"
 *   ),
 *   @OA\Property(
 *       property="email",
 *       type="string",
 *       required={"true"},
 *       description="The FieldSupervisor email"
 *   ),
 *   @OA\Property(
 *       property="phone_number",
 *       type="string",
 *       required={"true"},
 *       description="The FieldSupervisor phone_number"
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
class FieldSupervisor extends User
{
    protected $table = 'users';
}
