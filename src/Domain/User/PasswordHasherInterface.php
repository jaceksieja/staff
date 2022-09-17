<?php

namespace App\Domain\User;

interface PasswordHasherInterface
{
    public function __invoke(string $password): string;
}
