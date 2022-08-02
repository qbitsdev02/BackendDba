<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 * @OA\Schema(
 *   schema="Company",
 *   type="object",
 *   @OA\Property(
 *       property="name",
 *       type="string",
 *       required={"true"},
 *       description="The name company"
 *   ),
 *  @OA\Property(
 *       property="document_number",
 *       type="string",
 *       required={"true"},
 *       description="The rif company"
 *   ),
 *  @OA\Property(
 *       property="email",
 *       type="string",
 *       required={"true"},
 *       description="The email company"
 *   ),
 *  *  @OA\Property(
 *       property="phone_number",
 *       type="string",
 *       required={"true"},
 *       description="The rif company"
 *   ),
 *   @OA\Property(
 *       property="description",
 *       type="string",
 *       required={"true"},
 *       description="description company"
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
class Company extends Base
{
    use HasFactory;


    
}
