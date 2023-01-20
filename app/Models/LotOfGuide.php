<?php

namespace App\Models;

class LotOfGuide extends Base
{
    /**
     * Get all of the guides for the LotOfGuide
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guides()
    {
        return $this->belongsToMany(Guide::class);
    }
}
