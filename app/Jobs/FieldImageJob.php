<?php

namespace App\Jobs;

use App\Helpers\ImageHelper;
use App\Models\FieldCashFlow;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FieldImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $fieldCashFlow;

    public $images;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(FieldCashFlow $fieldCashFlow, $images)
    {
        $this->fieldCashFlow = $fieldCashFlow;
        $this->images = $images;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $imgModel = collect($this->images)
            ->map(function($image) {
                return [
                    'img' => ImageHelper::convertFormat($image['img'], 'field_cash_flows'),
                    'user_created_id' => $this->fieldCashFlow->user_created_id
                ];
            });
        
        $this->fieldCashFlow->images()->createMany($imgModel);
    }
}
