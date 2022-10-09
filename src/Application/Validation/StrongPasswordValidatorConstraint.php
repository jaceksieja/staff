<?php

namespace App\Application\Validation;

use App\Domain\User\Validator\ValidatorConstraintInterface;

class StrongPasswordValidatorConstraint implements ValidatorConstraintInterface
{
    public function getFieldName(): string
    {
        return 'password';
    }

    public function getDetails(): array
    {
        return ['password should has minimum 8 characters in length, at least one uppercase English letter, at least one lowercase English letter, at least one digit, at least one special character'];
    }

    public function __invoke(mixed $value): bool
    {
        return (bool) preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', (string) $value);
    }
}
