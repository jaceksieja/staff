<?php

namespace App\Application\Validation;

use App\Application\Model\RegisterUserDTO;
use App\Domain\User\Exception\ValidationException;

class RegisterValidation implements RegisterValidatorInterface
{
    private iterable $constraints;

    public function __construct(iterable $constraints)
    {
        $this->constraints = $constraints;
    }

    public function __invoke(RegisterUserDTO $registerUserDTO): ValidationResultInterface
    {
        foreach ($this->constraints as $constraint) {
            if (!($constraint)($registerUserDTO)) {
                throw new ValidationException($constraint->getDetails());
            }
        }

        return new ValidationResult();
    }
}
