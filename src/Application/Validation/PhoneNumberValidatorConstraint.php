<?php

namespace App\Application\Validation;

use App\Domain\User\Validator\ValidatorConstraintInterface;

class PhoneNumberValidatorConstraint implements ValidatorConstraintInterface
{
    private const FIELD_NAME = 'phoneNumber';

    public function getField(): string
    {
        return self::FIELD_NAME;
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
