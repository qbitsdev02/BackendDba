<?php

namespace App\Models;

use Attribute;

class Product extends Base
{
    /**
        * @OA\Schema(
        *   schema="Product",
        *   type="object",
        *   @OA\Property(
        *       property="name",
        *       type="string",
        *       required={"true"},
        *       description="The Productname"
        *   ),
        *   @OA\Property(
        *       property="description",
        *       type="string",
        *       required={"true"},
        *       description="The Product description"
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
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * Get the brand that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * The attributeTypes that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributeTypes()
    {
        return $this->belongsToMany(AttributeType::class)
            ->withPivot([
                'description'
            ]);
;
    }
}
