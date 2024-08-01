<?php

namespace Affiliateforge\PhpAdmitadApi;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Http\Discovery\Psr17Factory;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;

class APIClient
{
    private const BASE_URL = 'https://api.admitad.com';

    private ClientInterface $httpClient;

    public function __construct(
        ClientInterface $httpClient = null
    ){
        $this->httpClient = $httpClient ?? Psr18ClientDiscovery::find();
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function doRequest(CommandDTO $command, array $headers = []): ResponseDTO
    {
        $request = $this->buildRequest($command, $headers);
        $response = $this->httpClient->sendRequest($request);

        return $command->makeResponseDTO($response);
    }

    private function buildRequest(CommandDTO $command, array $headers): RequestInterface
    {
        $defaultHeaders = ['Content-Type' => 'application/x-www-form-urlencoded'];
        $allHeaders = array_merge($defaultHeaders, $headers);

        $factory = new Psr17Factory();

        $uri = $factory->createUri(static::BASE_URL)
            ->withPath($command->getUrlPath())
            ->withQuery(http_build_query($command->getQueryParams()));

        $request = $factory->createRequest($command->getHttpMethod(), $uri)
            ->withBody($factory->createStream(json_encode($command->getBody())));
        foreach ($allHeaders as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        return $request;
    }
}