<?php

namespace App\Models;
/**
 * @OA\Schema(
 *   schema="Coin",
 *   type="object",
 *   @OA\Property(
 *       property="acronym",
 *       type="string",
 *       required={"true"},
 *       description="The Coin acronym"
 *   ),
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The Coin name"
 *   ),
 *   @OA\Property(
 *       property="active",
 *       type="string",
 *       required={"true"},
 *       description="The Coin active"
 *   ),
 *   @OA\Property(
 *       property="Symbol",
 *       type="string",
 *       required={"true"},
 *       description="The Coin Symbol"
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
class Coin extends Base
{
    public static $filterable = [];
}
