<?php

namespace App\Models;

class DevolutionReason extends Base
{

    /**
     * @OA\Schema(
     *   schema="DevolutionReason",
     *   type="object",
     *   @OA\Property(
     *       property="name",
     *       type="string",
     *       required={"true"},
     *       description="The DevolutionReason name"
     *   ),
     *   @OA\Property(
     *       property="description",
     *       type="string",
     *       required={"true"},
     *       description="The DevolutionReason description"
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
