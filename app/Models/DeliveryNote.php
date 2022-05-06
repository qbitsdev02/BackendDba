<?php

namespace App\Models;

class DeliveryNote extends Base
{
    protected $with = [
        'client:id,name,document_number,address,email,phone_number',
        'materialSupplier:id,name,document_number,address,email,phone_number,signature,seal,logo'
    ];

    /**
     * Get the client that owns the DeliveryNote
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    /**
     * Get the materialSupplier that owns the DeliveryNote
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materialSupplier()
    {
        return $this->belongsTo(MaterialSupplier::class);
    }
}
