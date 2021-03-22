<?php

namespace App\Models;

class AttributeType extends Base
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'name',
        'user_created_id',
        'user_updated_id'
    ];

}
