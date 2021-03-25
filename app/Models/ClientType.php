<?php

namespace App\Models;
class ClientType extends Base
{
    /**
     * @OA\Schema(
     *   schema="ClientType",
     *   type="object",
     *   @OA\Property(
     *       property="name",
     *       type="string",
     *       required={"true"},
     *       description="The ClientType name"
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

    public static $filterable = [
        'name',
        'description',
    ];
}
