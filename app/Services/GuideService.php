<?php

namespace App\Services;

use App\Models\Guide;
use Illuminate\Support\Facades\Storage;

class GuideService
{
    public function saveImages(Guide $guide, $images)
    {
        collect($images)
            ->each(function ($image) use ($guide) {
                if ($image != 'undefined') {
                    $path = Storage::putFile("guide/{$guide->name}", $image);
                    $guide->images()->create([
                        'img' => $path,
                        'user_created_id' => $guide->user_created_id,
                        'user_updated_id' => $guide->user_updated_id
                    ]);
                }
            });
    }

    public function saveCosts(Guide $guide, $costs)
    {
        $guide->guideServiceCosts()->sync($costs);
    }
}
