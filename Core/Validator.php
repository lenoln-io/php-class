<?php

namespace Core;

class Validator
{
    public static function validateNote($string, $min = 1, $max = INF): bool
    {
        $text = strlen(trim($string));

        return $text < $min || $text >= $max;
    }

    public static function validateEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}