<?php

namespace App\Models;

class Driver extends Base
{
    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->document_number}-{$this->name}";
    }

    public function ownerable()
    {
        return $this->morphTo();
    }
}
