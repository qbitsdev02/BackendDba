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
       'user_created_id',
       'user_updated_id'
   ];
}
