<?php

namespace App\Models;
/**
 * @OA\Schema(
 *   schema="OperationType",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The Operation Type name"
 *   ),
 *   @OA\Property(
 *       property="Description",
 *       type="string",
 *       required={"true"},
 *       description="The Operation Type password"
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
class OperationType extends Base
{
    public static $filterable = [
        'name',
        'description',
    ];
}
