<?php

namespace App\Observers;

use App\Models\FieldCashFlow;

class FieldCashFlowObserver
{
    /**
     * Handle the FieldCashFlow "created" event.
     *
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return void
     */
    public function created(FieldCashFlow $fieldCashFlow)
    {
        $fieldCashFlow->images()->createMany(request()->image);
    }

    /**
     * Handle the FieldCashFlow "updated" event.
     *
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return void
     */
    public function updated(FieldCashFlow $fieldCashFlow)
    {
        //
    }

    /**
     * Handle the FieldCashFlow "deleted" event.
     *
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return void
     */
    public function deleted(FieldCashFlow $fieldCashFlow)
    {
        //
    }

    /**
     * Handle the FieldCashFlow "restored" event.
     *
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return void
     */
    public function restored(FieldCashFlow $fieldCashFlow)
    {
        //
    }

    /**
     * Handle the FieldCashFlow "force deleted" event.
     *
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return void
     */
    public function forceDeleted(FieldCashFlow $fieldCashFlow)
    {
        //
    }
}
