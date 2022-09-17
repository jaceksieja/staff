<?php

namespace App\Domain\User\DTO;

use App\Domain\User\Model\Position;

class CreateUserDTO
{
    public function __construct(
        private readonly string $login,
        private readonly string $password,
        private readonly Position $position,
        private readonly string $phoneNumber
    ) {
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPosition(): Position
    {
        return $this->position;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}
