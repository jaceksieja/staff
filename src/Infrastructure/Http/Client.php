<?php

namespace App\Infrastructure\Http;

use App\Application\Integration\ReqresIn\ClientInterface;
use App\Application\Integration\ReqresIn\Request\RequestInterface;
use App\Application\Integration\ReqresIn\Response\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Client implements ClientInterface
{
    public function __construct(private readonly HttpClientInterface $reqresInClient)
    {
    }

    public function __invoke(RequestInterface $request): Response
    {
        $response = $this->reqresInClient->request(
            $request->getMethod(),
            $request->getEndpoint(),
            $request->getOptions()
        );

        if (Response::SUCCESS_CODE !== $response->getStatusCode()) {
            throw new \HttpException();
        }

        $content = (array) json_decode(
            $response->getContent(),
            false,
            512,
            JSON_THROW_ON_ERROR
        );

        if (!isset($content['id'])) {
            throw new \HttpException();
        }

        return new Response($content['id']);
    }
}
