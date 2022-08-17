<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageHelper
{
    static function convertFormat(String $photo, String $file = '')
    {
        $extension = explode('/', explode(':', substr($photo, 0, strpos($photo, ';')))[1])[1];   // .jpg .png .pdf

        $replace = substr($photo, 0, strpos($photo, ',') + 1);

        $image = str_replace($replace, '', $photo);

        $image = str_replace(' ', '+', $image);

        $imageName = Str::random(30).'.'.$extension;

        Storage::disk('dropbox')->put("{$file}/{$imageName}", base64_decode($image),);

        return "{$file}/{$imageName}";
    }
}
