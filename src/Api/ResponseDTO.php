<?php

namespace Affiliateforge\PhpAdmitadApi\Api;

use Psr\Http\Message\ResponseInterface;

abstract class ResponseDTO
{
    protected ResponseInterface $originalResponse;
    protected ?array $parsedBody;

    public function __construct(ResponseInterface $originalResponse)
    {
        $this->originalResponse = $originalResponse;
        $this->parsedBody = json_decode($originalResponse->getBody()->getContents(), true);
        $originalResponse->getBody()->rewind();
    }

    public function getOriginalResponse(): ResponseInterface
    {
        return $this->originalResponse;
    }

    public function getParsedBody(): ?array
    {
        return $this->parsedBody;
    }

    public function isError(): bool
    {
        return $this->originalResponse->getStatusCode() !== 200;
    }

    public function getErrorDTO(): ?ErrorDTO
    {
        return !$this->isError() ? null : new ErrorDTO(
            $this->getOriginalResponse()->getStatusCode(),
            $this->getOriginalResponse()->getReasonPhrase(),
            $this->getParsedBody()['error'] ?? null,
            $this->getParsedBody()['error_description'] ?? null,
        );
    }
}