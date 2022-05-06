<?php

namespace App\Models;

class Client extends Base
{
    /**
     * The states that belong to the MaterialSupplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function states()
    {
        return $this->belongsToMany(State::class)
          ->using(ClientState::class);
    }
}
