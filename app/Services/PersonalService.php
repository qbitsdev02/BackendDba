<?php

namespace App\Services;

use App\Models\Personal;
use Illuminate\Support\Facades\Storage;

class PersonalService
{
    public function saveImages(Personal $personal, $images)
    {
        collect($images)
            ->each(function ($image) use ($personal) {
                if ($image != 'undefined') {
                    $path = Storage::putFile("personals/{$personal->name}", $image);
                    $personal->images()->create([
                        'img' => $path,
                        'user_created_id' => $personal->user_created_id,
                        'user_updated_id' => $personal->user_updated_id
                    ]);
                }
            });
    }
}
