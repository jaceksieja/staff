<?php

namespace App\Application\Model;

use App\Domain\User\Model\Position;

abstract class User extends \App\Domain\User\Model\User
{
    public function __construct(
        protected string $login,
        protected string $loginCanonical,
        protected string $password,
        protected Position $position,
        protected string $phoneNumber,
    ) {
        parent::__construct($this->login, $this->password, $this->position, $this->phoneNumber);
    }

    protected ?string $reqresInId = null;

    public function assignReqresInId(string $reqresInId): void
    {
        if (null !== $this->reqresInId) {
            throw new \LogicException('ReqresIn id is already set');
        }

        $this->reqresInId = $reqresInId;
    }
}
