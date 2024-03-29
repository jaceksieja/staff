<?php

namespace App\Application\Validation;

use App\Domain\User\Validator\ValidatorConstraintInterface;

class PhoneNumberValidatorConstraint implements ValidatorConstraintInterface
{
    public function getFieldName(): string
    {
        return 'phoneNumber';
    }

    public function getDetails(): array
    {
        return ['wrong format. Properly format is: +48 XXX XXX XXX'];
    }

    public function __invoke(mixed $value): bool
    {
        return preg_match('/^\+48\s[0-9]{3}\s[0-9]{3}\s[0-9]{3}/', (string) $value);
    }
}
