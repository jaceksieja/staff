<?php

namespace App\Application\Bus;

use App\Domain\User\Action\Event\EventInterface;

interface EventPublisher
{
    public function __invoke(EventInterface $event);
}
