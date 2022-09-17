<?php

namespace App\Application\Action;

use App\Domain\User\Action\Event\UserCreated;
use App\Domain\User\Action\GetUser;

class RegisterUserInReqresIn
{
    public function __construct(private readonly GetUser $getUser)
    {
    }

    public function __invoke(UserCreated $userCreated)
    {
        $user = ($this->getUser)($userCreated->getUserId());

    }
}
