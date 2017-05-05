<?php

namespace App\Utils;

class StringTool
{
    static function normalizeNames(String $value): string
    {
        $value = strtolower($value);
        return ucwords($value);
    }
}
