<?php

namespace App\Domain\User\Exception;

class UserNotFoundException extends \DomainException
{
    public function __construct(
        string $userId
    ) {
        parent::__construct(sprintf('User with id: %s not found', $userId));
    }
}
