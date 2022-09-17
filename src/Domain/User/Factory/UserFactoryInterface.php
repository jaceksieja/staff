<?php

namespace App\Domain\User\Factory;

use App\Domain\User\Model\UserInterface;

interface UserFactoryInterface
{
    public function create(string $login, string $password, string $position, string $phoneNumber): UserInterface;
}
