<?php

namespace App\Application\Integration\ReqresIn;

use App\Application\Integration\ReqresIn\Request\RequestInterface;
use App\Application\Integration\ReqresIn\Response\Response;

interface ClientInterface
{
    public function __invoke(RequestInterface $request): Response;
}
