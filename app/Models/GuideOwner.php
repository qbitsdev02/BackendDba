<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideOwner extends Model
{
    public function ownerable()
    {
        return $this->morphTo();
    }

    public function responsable()
    {
        return $this->morphTo();
    }
}
