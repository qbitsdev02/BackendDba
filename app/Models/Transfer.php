<?php

namespace App\Models;

class Transfer extends Base
{
    /**
     * Get all of the transferDetails for the Transfer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transferDetails()
    {
        return $this->hasMany(TransferDetail::class);
    }
}
