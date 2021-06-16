<?php

namespace App\Observers;

use App\Models\BudgetRequest;

class BudgetRequestObserver
{
    /**
     * Handle the BudgetRequest "created" event.
     *
     * @param  \App\Models\BudgetRequest  $budgetRequest
     * @return void
     */
    public function created(BudgetRequest $budgetRequest)
    {
        $budgetRequest
            ->budgetRequestDetails()
            ->createMany(request()->budgetRequestDetails);

        collect(request()->providers)
            ->each(function($provider) use($budgetRequest) {
                $budgetRequest
                    ->budgetRequestProvider()
                    ->attach($provider['provider_id'], [
                        'email' => $provider['email'],
                        'user_created_id' => $provider['user_created_id']
                    ]);
            });
    }

    /**
     * Handle the BudgetRequest "updated" event.
     *
     * @param  \App\Models\BudgetRequest  $budgetRequest
     * @return void
     */
    public function updated(BudgetRequest $budgetRequest)
    {
        //
    }

    /**
     * Handle the BudgetRequest "deleted" event.
     *
     * @param  \App\Models\BudgetRequest  $budgetRequest
     * @return void
     */
    public function deleted(BudgetRequest $budgetRequest)
    {
        //
    }

    /**
     * Handle the BudgetRequest "restored" event.
     *
     * @param  \App\Models\BudgetRequest  $budgetRequest
     * @return void
     */
    public function restored(BudgetRequest $budgetRequest)
    {
        //
    }

    /**
     * Handle the BudgetRequest "force deleted" event.
     *
     * @param  \App\Models\BudgetRequest  $budgetRequest
     * @return void
     */
    public function forceDeleted(BudgetRequest $budgetRequest)
    {
        //
    }
}
