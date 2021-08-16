<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AttributeTypeProduct extends Pivot
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'product_id',
       'attribute_type_id',
       'description',
       'user_created_id',
       'user_updated_id'
   ];
    /**
     * The attributes that are mass with.
     *
     * @var array
     */
    protected $with = [
        'attributeType:id,name'
    ];
   /**
    * Get the attributeType that owns the AttributeTypeProduct
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function attributeType()
   {
       return $this->belongsTo(AttributeType::class);
   }
}
