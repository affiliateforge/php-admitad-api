<?php

namespace Affiliateforge\PhpAdmitadApi;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Http\Discovery\Psr17Factory;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class APIClient
{
    private const BASE_URL = 'https://api.admitad.com';

    private ClientInterface $httpClient;
    private LoggerInterface $logger;

    public function __construct(
        ClientInterface $httpClient = null,
        LoggerInterface $logger = null,
    ){
        $this->httpClient = $httpClient ?? Psr18ClientDiscovery::find();
        $this->logger = $logger ?? new NullLogger();

    }

    public function doRequest(CommandDTO $command, array $headers = []): ResponseDTO
    {
        $request = $this->buildRequest($command, $headers);
        $this->logRequest($request);

        $response = $this->httpClient->sendRequest($request);
        $this->logResponse($request, $response);

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

    private function logRequest(RequestInterface $request): void
    {
        $this->logger->debug("Request to Admitad API is built (DEBUG)", [
            'uri' => (string) $request->getUri(),
            'method' => $request->getMethod(),
            'headers' => $request->getHeaders(),
            'body' => $request->getBody()->getContents(),
        ]);
        $request->getBody()->rewind();
    }

    private function logResponse(RequestInterface $request, ResponseInterface $response): void
    {
        $debugLevelRequestData = [
            'uri' => (string) $request->getUri(),
            'method' => $request->getMethod(),
            'headers' => $request->getHeaders(),
            'body' => $request->getBody()->getContents(),
        ];

        $debugLevelResponseData = [
            'status' => $response->getStatusCode(),
            'message' => $response->getReasonPhrase(),
            'headers' => $response->getHeaders(),
            'body' => json_decode($response->getBody()->getContents(), true),
        ];
        $this->logger->debug('Response from Admitad API (DEBUG)', [
            'request' => $debugLevelRequestData,
            'response' => $debugLevelResponseData,
        ]);

        $infoLevelRequestData = $debugLevelRequestData;
        unset($infoLevelRequestData['headers']['Authorization']);

        $infoLevelResponseData = $debugLevelResponseData;
        unset($infoLevelResponseData['body']['access_token']);
        unset($infoLevelResponseData['body']['refresh_token']);

        $this->logger->info("Response from Admitad API (INFO)", [
            'request' => $infoLevelRequestData,
            'response' => $infoLevelResponseData,
        ]);

        $request->getBody()->rewind();
        $response->getBody()->rewind();
    }
}