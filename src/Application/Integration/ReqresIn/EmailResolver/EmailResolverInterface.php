<?php

namespace App\Application\Integration\ReqresIn\EmailResolver;

interface EmailResolverInterface
{
    public function __invoke(string $login): string;
}
