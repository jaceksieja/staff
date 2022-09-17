<?php

namespace App\Domain\User\Action\Event;

class UserUpdated implements EventInterface
{
    public function __construct(
        private readonly string $userId
    ) {
    }

    public function getUserId(): string
    {
        return $this->userId;
    }
}
