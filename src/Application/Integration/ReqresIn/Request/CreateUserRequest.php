<?php

namespace App\Application\Integration\ReqresIn\Request;

class CreateUserRequest implements RequestInterface
{
    public function __construct(
        private readonly string $email,
        private readonly string $password
    ) {
    }

    public function getMethod(): string
    {
        return self::CREATE_METHOD;
    }

    public function getEndpoint(): string
    {
        return self::USERS_ENDPOINT;
    }

    public function getOptions(): array
    {
        return [
            'body' => [
                'email' => $this->email,
                'password' => $this->password,
            ]
        ];
    }
}
