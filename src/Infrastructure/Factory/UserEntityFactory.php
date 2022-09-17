<?php

namespace App\Infrastructure\Factory;

use App\Application\Canonicalizer;
use App\Domain\User\Factory\UserFactoryInterface;
use App\Domain\User\Model\Position;
use App\Domain\User\Model\UserInterface;
use App\Infrastructure\Entity\User;

class UserEntityFactory implements UserFactoryInterface
{
    public function __construct(private readonly Canonicalizer $canonicalizer)
    {
    }

    public function create(
        string $login,
        string $password,
        string $position,
        string $phoneNumber,
    ): UserInterface {

        $loginCanonical = ($this->canonicalizer)($login);

        return new User(
            $login,
            $loginCanonical,
            $password,
            Position::from($position),
            $phoneNumber,
        );
    }
}
