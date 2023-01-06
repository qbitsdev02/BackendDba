<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function getImgAttribute($value)
    {
        return Storage::url($value);
    }
    /**
     * Relationship
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
