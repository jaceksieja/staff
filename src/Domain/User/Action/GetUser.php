<?php

namespace App\Domain\User\Action;

use App\Domain\User\Exception\UserNotFoundException;
use App\Domain\User\Model\UserInterface;
use App\Domain\User\Repository\UserRepositoryInterface;

class GetUser
{
    public function __construct(private readonly UserRepositoryInterface $repository)
    {
    }

    public function __invoke(string $id): UserInterface
    {
        if (null === ($user = $this->repository->findById($id))) {
            throw new UserNotFoundException($id);
        }

        return $user;
    }
}
