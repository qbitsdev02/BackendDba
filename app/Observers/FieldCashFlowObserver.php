<?php

namespace App\Observers;

use App\Helpers\ImageHelper;
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
            $imgModel = collect(request()->images)
                ->map(function($image)use ($fieldCashFlow) {
                    return [
                        'img' => ImageHelper::convertFormat($image['img'], 'field_cash_flows'),
                        'user_created_id' => $fieldCashFlow->user_created_id
                    ];
                });

            $fieldCashFlow->images()->createMany($imgModel);
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
