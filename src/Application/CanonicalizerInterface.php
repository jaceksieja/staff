<?php

namespace App\Application;

interface CanonicalizerInterface
{
    public function __invoke(string $string): string;
}
