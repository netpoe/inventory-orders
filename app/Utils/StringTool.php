<?php

namespace App\Utils;

class StringTool
{
    const RANDOM_STRING_CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    static function normalizeNames(String $value): string
    {
        $value = strtolower($value);
        return ucwords($value);
    }

    static function getRandomString(Int $length = 12): string
    {
        $factory = new \RandomLib\Factory;
        $generator = $factory->getLowStrengthGenerator();
        $randomString = $generator->generateString($length, self::RANDOM_STRING_CHARS);

        return $randomString;
    }
}
