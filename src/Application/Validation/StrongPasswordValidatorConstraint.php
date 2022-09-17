<?php

namespace App\Application\Validation;

use App\Domain\User\Validator\ValidatorConstraintInterface;

class StrongPasswordValidatorConstraint implements ValidatorConstraintInterface
{
    public function getField(): string
    {
        return 'password';
    }

    public function getDetails(): array
    {
        return [];
    }

    public function __invoke(mixed $value): bool
    {
        return true;
    }
}
