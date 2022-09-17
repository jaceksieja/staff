<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Model\UserInterface;

interface UserRepositoryInterface
{
    public function save(UserInterface $user): UserInterface;
    public function findById(string $id): ?UserInterface;
}
