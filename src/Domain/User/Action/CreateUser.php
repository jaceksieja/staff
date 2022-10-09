<?php

namespace App\Domain\User\Action;

use App\Domain\User\Action\Event\UserCreated;
use App\Domain\User\Factory\UserFactoryInterface;
use App\Domain\User\PasswordHasherInterface;
use App\Domain\User\Repository\UserRepositoryInterface;

class CreateUser
{
    public function __construct(
        private readonly UserRepositoryInterface $repository,
        private readonly PasswordHasherInterface $passwordHasher,
        private readonly UserFactoryInterface $factory,
    ) {
    }

    public function __invoke(
        string $login,
        string $password,
        string $position,
        string $phoneNumber,
    ): UserCreated {
        $encodedPassword = ($this->passwordHasher)($password);

        $user = $this->repository->save(
            $this->factory->create(
                $login, $encodedPassword, $position, $phoneNumber
            )
        );

        // @todo before send to queue password should be encrypted
        return new UserCreated(
            $user->getId(),
            $login,
            $password,
        );
    }
}
