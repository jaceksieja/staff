<?php

namespace App\Domain\User\Model;

abstract class User
{
    public function __construct(
        protected string $login,
        protected string $password,
        protected Position $position,
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

    public function getPosition(): Position
    {
        return $this->position;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getId(): ?string
    {
        return null;
    }
}
