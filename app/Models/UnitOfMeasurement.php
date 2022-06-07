<?php

namespace App\Models;
class UnitOfMeasurement extends Base
{
    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->name} ({$this->acronym})";
    }
}
