<?php

namespace App\Utils;

class StringTool
{
    static function normalizeNames(String $value)
    {
        $value = strtolower($value);
        return ucwords($value);
    }
}
