<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class SwornDeclaration extends Base
{
    public function getImagenAttribute($value)
    {
        return  Storage::disk('dropbox')->url($value);
    }
}
