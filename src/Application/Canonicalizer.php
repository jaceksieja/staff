<?php

namespace App\Application;

class Canonicalizer implements CanonicalizerInterface
{
    public function __invoke(string $string): string
    {
        $encoding = mb_detect_encoding($string, mb_detect_order(), true);

        return $encoding
            ? mb_convert_case($string, MB_CASE_LOWER, $encoding)
            : mb_convert_case($string, MB_CASE_LOWER);
    }
}
