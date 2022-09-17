<?php

namespace App\Domain\User\Model;

interface UserInterface
{
    public function getId(): ?string;

    public function getPassword(): string;
}
