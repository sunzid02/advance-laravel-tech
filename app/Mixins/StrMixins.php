<?php


namespace App\Mixins;


class StrMixins
{
    public function partNumber()
    {
        //adding this into $macros array in Macroable.php
        return function ($part) {
            return 'OTHER-'.substr($part, 0, 3).'-'.substr($part, 3);
        };
    }

    public function prefix()
    {
        return function ($string, $prefix = 'AB-') {
            return $prefix.$string;
        };
    }
}