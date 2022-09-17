<?php

namespace App\Application\Validation;

use App\Application\Model\RegisterUserDTO;

interface RegisterValidatorInterface
{
    public function __invoke(RegisterUserDTO $registerUserDTO): ValidationResultInterface;
}
