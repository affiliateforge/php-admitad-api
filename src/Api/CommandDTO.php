<?php

namespace Affiliateforge\PhpAdmitadApi\Api;

use Psr\Http\Message\ResponseInterface;

abstract class CommandDTO
{
    abstract public function getHttpMethod(): string;
    abstract public function getUrlPath(): string;
    abstract public function makeResponseDTO(ResponseInterface $response): ResponseDTO;

    public function getQueryParams(): array
    {
        return [];
    }

    public function getBody() :array
    {
        return [];
    }
}