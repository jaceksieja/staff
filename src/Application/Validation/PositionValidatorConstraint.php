<?php

namespace App\Application\Validation;

use App\Domain\User\Model\Position;
use App\Domain\User\Validator\ValidatorConstraintInterface;

class PositionValidatorConstraint implements ValidatorConstraintInterface
{
    public function getFieldName(): string
    {
        return 'position';
    }

    public function getDetails(): array
    {
        return ['position is not allowed'];
    }

    public function __invoke(mixed $value): bool
    {
        return in_array(
            strtolower($value),
            array_map(static fn ($position) => strtolower($position), array_column(Position::cases(), 'value')),
            true
        );
    }
}
