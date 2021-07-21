<?php

namespace App\Models;

class AccountingPlan extends Base
{
    /**
     * @OA\Schema(
     *   schema="AccountingPlan",
     *   type="object",
     *   @OA\Property(
     *       property="name",
     *       type="string",
     *       required={"true"},
     *       description="The AccountingPlan name"
     *   ),
     *   @OA\Property(
     *       property="description",
     *       type="string",
     *       required={"true"},
     *       description="The AccountingPlan description"
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
}
