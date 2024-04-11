<?php

namespace Affiliateforge\PhpAdmitadApi\Api;

class ErrorDTO
{
    public function __construct(
        private readonly int $httpCode,
        private readonly string $httpCodePhrase,
        private readonly ?string $errorCode,
        private readonly ?string $errorDescription
    ){}

    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    public function getHttpCodePhrase(): string
    {
        return $this->httpCodePhrase;
    }

    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    public function getErrorDescription(): ?string
    {
        return $this->errorDescription;
    }
}