<?php
class Validator
{

    public static function string($value, $min = 1, $max = INF)
    {

        return trim($value) && strlen($value) > $min && strlen($value) < $max;
    }
}
