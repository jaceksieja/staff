<?php

namespace App\Domain\User\Action\Event;

class UserCreated implements EventInterface
{
    public function __construct(
        private readonly string $userId,
        private readonly string $login,
        private readonly string $password
    ) {
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
