<?php

namespace App\Application\Action;

use App\Application\Bus\EventPublisher;
use App\Domain\User\Action\UpdateUser;
use App\Domain\User\Model\UserInterface;

class AssignReqresIoIdToUser
{
    public function __construct(
        private readonly UpdateUser $updateUser,
        private readonly EventPublisher $eventPublisher,
    ) {
    }

    public function __invoke(UserInterface $user, string $id): string
    {
        $user->assignReqresInId($id);

        $event = ($this->updateUser)($user);

        ($this->eventPublisher)($event);

        return $event->getUserId();
    }
}
