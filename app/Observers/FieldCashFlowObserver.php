<?php

namespace App\Observers;

use App\Helpers\ImageHelper;
use App\Jobs\FieldImageJob;
use App\Models\FieldCashFlow;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
        if(request()->has('images')) {
            FieldImageJob::dispatch($fieldCashFlow, request()->images);
        }
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
