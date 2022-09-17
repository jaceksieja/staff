<?php

namespace App\Application\Integration\ReqresIn\Request;

interface RequestInterface
{
    public const CREATE_METHOD = 'POST';

    public const USERS_ENDPOINT = 'users';

    public function getMethod(): string;

    public function getEndpoint(): string;

    public function getOptions(): array;
}
