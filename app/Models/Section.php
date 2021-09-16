<?php

namespace App\Models;
class Section extends Base
{
    /**
     * Get all of the modules for the Section
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
