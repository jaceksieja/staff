<?php

namespace App\Application\Action;

use App\Application\Bus\EventPublisher;
use App\Application\Model\RegisterUserDTO;
use App\Application\Validation\RegisterValidatorInterface;
use App\Domain\User\Action\CreateUser;

class RegisterUser
{
    public function __construct(
        private readonly CreateUser $createUser,
        private readonly EventPublisher $eventPublisher,
        private readonly RegisterValidatorInterface $registerValidator
    ) {
    }

    public function __invoke(RegisterUserDTO $registerDTO): string
    {
        ($this->registerValidator)($registerDTO);

        $event = ($this->createUser)(
            $registerDTO->getLogin(),
            $registerDTO->getPassword(),
            $registerDTO->getPosition(),
            $registerDTO->getPhoneNumber(),
        );

        ($this->eventPublisher)($event);

        return $event->getUserId();
    }
}
