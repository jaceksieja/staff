<?php

namespace App\Infrastructure\Messenger\Handler;

use App\Application\Action\AssignReqresIoIdToUser;
use App\Application\Integration\ReqresIn\Action\CreateUserInterface;
use App\Application\Integration\ReqresIn\EmailResolver\EmailResolverInterface;
use App\Application\Integration\ReqresIn\ClientInterface;
use App\Application\Integration\ReqresIn\Request\CreateUserRequest;
use App\Domain\User\Action\Event\UserCreated;
use App\Domain\User\Action\GetUser;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler(priority: 100)]
class CreateUserHandler implements CreateUserInterface
{
    public function __construct(
        private readonly GetUser $getUser,
        private readonly AssignReqresIoIdToUser $assignReqresIoIdToUser,
        private readonly EmailResolverInterface $emailResolver,
        private readonly ClientInterface $client
    ) {
    }

    public function __invoke(UserCreated $event): void
    {
        $user = ($this->getUser)($event->getUserId());

        $response = ($this->client)(new CreateUserRequest(
            ($this->emailResolver)($event->getLogin()),
            $event->getPassword(),
        ));

        ($this->assignReqresIoIdToUser)($user, $response->getId());
    }
}
