<?php

namespace App\Infrastructure\PasswordHasher;

use App\Domain\User\PasswordHasherInterface;
use Symfony\Component\PasswordHasher\PasswordHasherInterface as SymfonyPasswordHasherInterface;

class UserPasswordPasswordHasher implements PasswordHasherInterface
{
    public function __construct(private readonly SymfonyPasswordHasherInterface $passwordHasher)
    {
    }

    public function __invoke(string $password): string
    {
        return $this->passwordHasher->hash($password);
    }
}
