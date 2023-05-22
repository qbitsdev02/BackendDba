<?php

namespace App\Helpers;

class CommonHelper
{
    public static function divNum($numerator, $denominator)
    {
        return $denominator == 0 ? 0 : ($numerator / $denominator);
    }
}
