<?php

namespace App\Application\Validation;

use App\Domain\User\Validator\ValidatorConstraintInterface;

class MinimalLengthLoginValidatorConstraint implements ValidatorConstraintInterface
{
    public function getFieldName(): string
    {
        return 'login';
    }

    public function getDetails(): array
    {
        return ['in not unique'];
    }

    public function __invoke(mixed $value): bool
    {
        return strlen($value) <= 5;
    }
}
