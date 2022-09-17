<?php

namespace App\Application\Integration\ReqresIn\Response;

class Response
{
    public const SUCCESS_CODE = 201;

    public function __construct(private readonly string $id)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }
}
