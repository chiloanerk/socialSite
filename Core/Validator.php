<?php

namespace Core;

class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        // Validator::email('joe@example.com
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function passwordComplexity($value, $minLength = 7)
    {
        // Validate password complexity requirements
        $uppercaseCount = preg_match_all('/[A-Z]/', $value);
        $lowercaseCount = preg_match_all('/[a-z]/', $value);
        $digitCount = preg_match_all('/\d/', $value);
        $specialCharCount = preg_match_all('/[^A-Za-z0-9]/', $value);

        $validations = [
          $uppercaseCount >= 1,
          $lowercaseCount >= 1,
          $digitCount >= 1,
          $specialCharCount >= 1,
          strlen($value) >= $minLength
        ];

        return !in_array(false, $validations);
    }
}