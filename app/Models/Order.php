<?php

namespace App\Models;

/**
 * @OA\Schema(
 *   schema="Order",
 *   type="object",
 *   @OA\Property(
 *       property="organization_id",
 *       type="number",
 *       example=1,
 *       required={"true"},
 *       description="The Order organization_id"
 *   ),
 *   @OA\Property(
 *       property="egress_type_id",
 *       type="number",
 *       example=1,
 *       required={"true"},
 *       description="The Order egress_type_id"
 *   ),
 *   @OA\Property(
 *       property="beneficiary_id",
 *       type="number",
 *       example=1,
 *       required={"true"},
 *       description="The Order beneficiary_id"
 *   ),
 *   @OA\Property(
 *       property="responsable_id",
 *       type="number",
 *       example=1,
 *       required={"true"},
 *       description="The Order responsable_id"
 *   ),
 *   @OA\Property(
 *       property="field_id",
 *       type="number",
 *       example=1,
 *       required={"true"},
 *       description="The Order field_id"
 *   ),
 *   @OA\Property(
 *       property="observation",
 *       type="number",
 *       example=1,
 *       required={"true"},
 *       description="The Order observation"
 *   ),
 *   @OA\Property(
 *       property="contract",
 *       type="string",
 *       required={"true"},
 *       description="The Order contract"
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
 *       example=1,
 *       required={"true"},
 *       description="The Users update"
 *   ),
 * )
 */
class Order extends Base
{
    //
}
