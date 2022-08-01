<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    use HasFactory;

    /**
     * Relationship ticket
     * A active has many ticket associated
     * 
     * Get the ticket associated to the active 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }


    /**
     * Relationship ActivepersonalTicket
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function activePersonalTickets()
    {
        return $this->hasMany(ActivePersonalTicket::class);
    }

}
