<?php

namespace App\Application\Validation;

use App\Application\Exception\ValidationException;
use App\Application\Model\RegisterUserDTO;
use App\Domain\User\Validator\ValidatorConstraintInterface;

class RegisterValidation implements RegisterValidatorInterface
{
    /** @var iterable<int, ValidatorConstraintInterface> */
    private iterable $constraints;

    public function __construct(iterable $constraints)
    {
        $this->addConstraints($constraints);
    }

    public function __invoke(RegisterUserDTO $registerUserDTO): void
    {
        $result = [];

        foreach ($this->constraints as $constraint) {
            $methodName = sprintf('get%s', ucfirst($constraint->getFieldName()));

            if (!($constraint)($registerUserDTO->$methodName())) {
                $result[$constraint->getFieldName()][] = $constraint->getDetails();
            }
        }

        if (!empty($result)) {
            throw new ValidationException($result);
        }
    }

    private function addConstraints(iterable $constraints): void
    {
        foreach ($constraints as $constraint) {
            if (!$constraint instanceof ValidatorConstraintInterface) {
                continue;
            }
            $this->addConstraint($constraint);
        }
    }

    private function addConstraint(ValidatorConstraintInterface $constraint): void
    {
        $this->constraints[] = $constraint;
    }
}
