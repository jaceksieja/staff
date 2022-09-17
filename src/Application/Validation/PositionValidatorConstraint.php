<?php

namespace App\Application\Validation;

use App\Domain\User\Validator\ValidatorConstraintInterface;

class PositionValidatorConstraint implements ValidatorConstraintInterface
{
    public function getField(): string
    {
        return 'position';
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
