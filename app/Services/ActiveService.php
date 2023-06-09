<?php

namespace App\Services;

use App\Models\Active;
use Illuminate\Support\Facades\Storage;

class ActiveService
{
    public function saveImages(Active $active, $images)
    {
        collect($images)
            ->each(function ($image) use ($active) {
                if ($image != 'undefined') {
                    $path = Storage::putFile("actives/{$active->name}", $image);
                    $active->images()->create([
                        'img' => $path,
                        'user_created_id' => $active->user_created_id,
                        'user_updated_id' => $active->user_updated_id
                    ]);
                }
            });
    }
    public function saveAttribute(Active $active, $attributes)
    {
        collect($attributes)
            ->each(function ($attribute) use($active) {
                $attr = json_decode($attribute, true);
                collect($attr)
                    ->each(function($att) use($active) {
                        if (isset($att['attribute'])) {
                            $active->attributes()
                                ->attach(
                                    [
                                        'attribute_id' => $att['attribute']['id']
                                    ],
                                    [
                                        'value' => $att['value'],
                                        'user_created_id' => $active->user_created_id
                                    ]
                            );
                        }
                    });
        });
    }
}
