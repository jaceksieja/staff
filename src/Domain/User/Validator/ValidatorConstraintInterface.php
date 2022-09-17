<?php

namespace App\Domain\User\Validator;

interface ValidatorConstraintInterface
{
    public function getField(): string;

    public function getDetails(): array;

    public function __invoke(mixed $value): bool;
}
