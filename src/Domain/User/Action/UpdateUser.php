<?php

namespace App\Domain\User\Action;

use App\Domain\User\Action\Event\UserUpdated;
use App\Domain\User\Model\UserInterface;
use App\Domain\User\Repository\UserRepositoryInterface;

class UpdateUser
{
    public function __construct(
        private readonly UserRepositoryInterface $repository
    ) {
    }

    public function __invoke(UserInterface $userModel): UserUpdated
    {
        $user = $this->repository->save($userModel);

        return new UserUpdated(
            $user->getId()
        );
    }
}
