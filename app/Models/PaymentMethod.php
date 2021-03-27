<?php

namespace App\Models;
/**
 * @OA\Schema(
 *   schema="PaymentMethod",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The Payment Method name"
 *   ),
 *   @OA\Property(
 *       property="Description",
 *       type="string",
 *       required={"true"},
 *       description="The Payment Method description"
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
class PaymentMethod extends Base
{
    //
}
