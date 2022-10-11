<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



/**
 *
 * @OA\Schema(
 *   schema="VoucherType",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="name"
 *   ),
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"true"},
 *       description="description"
 *   ),
 * @OA\Property(
 *       property="series_name",
 *       type="string",
 *       required={"true"},
 *       description="series_name"
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
 * */
class VoucherType extends Base
{
    use HasFactory;
}
