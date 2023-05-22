<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GuideLotOfGuide extends Pivot
{
    protected $fillable = ['guide_id'];
}
