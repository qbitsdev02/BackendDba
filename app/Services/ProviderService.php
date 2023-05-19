<?php

namespace App\Services;

use App\Models\Provider;
use Illuminate\Support\Facades\Storage;

class ProviderService
{
    public function saveImages(Provider $provider, $images)
    {
        collect($images)
            ->each(function ($image) use ($provider) {
                if ($image != 'undefined') {
                    $path = Storage::putFile("providers/{$provider->name}", $image);
                    $provider->images()->create([
                        'img' => $path,
                        'user_created_id' => $provider->user_created_id,
                        'user_updated_id' => $provider->user_updated_id
                    ]);
                }
            });
        return $this;
    }

    public function saveProviderTypes(Provider $provider, $providerTypes)
    {
        $provider->providerTypes()->attach($providerTypes);
        return $this;
    }
}
