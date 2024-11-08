<?php

namespace Core;
class Validators
{
    public static function string($value)
    {
        return empty(trim($value));
    }

    public static function stringMaxLength($value, $length)
    {
        return strlen($value) > $length;
    }

    public static function stringMinLength($value, $length)
    {
        return strlen($value) < $length;
    }

    public static function email($value){
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}