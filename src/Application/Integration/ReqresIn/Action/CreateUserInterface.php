<?php

namespace App\Application\Integration\ReqresIn\Action;

use App\Domain\User\Action\Event\UserCreated;

interface CreateUserInterface
{
    public function __invoke(UserCreated $event): void;
}
