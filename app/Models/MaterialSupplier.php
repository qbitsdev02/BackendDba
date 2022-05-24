<?php

namespace App\Models;

class MaterialSupplier extends Base
{
    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->document_number}-{$this->name}";
    } 
}
