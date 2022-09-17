<?php

namespace App\Application\Model;

class RegisterUserDTO
{
    public function __construct(
        protected string $login,
        protected string $password,
        protected string $position,
        protected string $phoneNumber
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

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}
