<?php

namespace App\Models;

class Category extends Base
{
    /**
     * @OA\Schema(
     *   schema="Category",
     *   type="object",
     *   @OA\Property(
     *       property="name",
     *       type="string",
     *       required={"true"},
     *       description="The Category name"
     *   ),
     *   @OA\Property(
     *       property="description",
     *       type="string",
     *       required={"true"},
     *       description="The Category description"
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
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'user_created_id',
        'user_updated_id'
    ];
}
