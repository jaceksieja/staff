<?php

namespace App\Application\Validation;

use App\Application\Canonicalizer;
use App\Application\Model\RegisterUserDTO;
use App\Domain\User\Validator\ValidatorConstraintInterface;
use App\Infrastructure\Repository\UserRepository;

class UniqueLoginValidatorConstraint implements ValidatorConstraintInterface
{
    public function __construct(
        private readonly UserRepository $repository,
        private readonly Canonicalizer $canonicalizer
    ) {
    }

    public function getField(): string
    {
        return 'login';
    }

    public function getDetails(): array
    {
        return [];
    }

    public function __invoke(mixed $value): bool
    {
        if ($value instanceof RegisterUserDTO) {
            $value = $value->getLogin();
        }

        $value = ($this->canonicalizer)($value);

        return !$this->repository->findByLoginCanonical($value);
    }
}
