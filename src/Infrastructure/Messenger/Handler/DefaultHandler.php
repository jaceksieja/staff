<?php

namespace App\Infrastructure\Messenger\Handler;

use App\Domain\User\Action\Event\EventInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler(priority: -100)]
class DefaultHandler
{
    public function __invoke(EventInterface $event): void
    {

    }
}
