<?php

namespace App\Observers;

use App\Models\Quotation;
use App\Services\QuotationService;
class QuotationObserver
{
    /**
     * Handle the Quotation "created" event.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return void
     */
    public function created(Quotation $quotation)
    {
        $service = new QuotationService();
        $service->saveQuotationDetails($quotation, request()->quotation_details);
        $service->saveQuotationPayments($quotation, request()->quotation_payments);
    }

    /**
     * Handle the Quotation "updated" event.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return void
     */
    public function updated(Quotation $quotation)
    {
        //
    }

    /**
     * Handle the Quotation "deleted" event.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return void
     */
    public function deleted(Quotation $quotation)
    {
        //
    }

    /**
     * Handle the Quotation "restored" event.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return void
     */
    public function restored(Quotation $quotation)
    {
        //
    }

    /**
     * Handle the Quotation "force deleted" event.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return void
     */
    public function forceDeleted(Quotation $quotation)
    {
        //
    }
}
