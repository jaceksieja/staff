<?php

namespace App\Infrastructure\Messenger;

use App\Application\Bus\EventPublisher;
use App\Domain\User\Action\Event\EventInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class Bus implements EventPublisher
{
    public function __construct(private readonly MessageBusInterface $messageBus)
    {
    }

    public function __invoke(EventInterface $event): void
    {
        $this->messageBus->dispatch($event);
    }
}
