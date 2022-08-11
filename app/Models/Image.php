<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * Relationship
     */
    public function fieldCashFlow()
    {
        return $this->belongsTo(FieldCashFlow::class);
    }
}
