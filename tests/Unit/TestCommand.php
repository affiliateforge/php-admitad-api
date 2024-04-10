<?php

namespace Tests\Unit;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Psr\Http\Message\ResponseInterface;

class TestCommand extends CommandDTO
{
    public function getHttpMethod(): string
    {
        return 'POST';
    }

    public function getUrlPath(): string
    {
        return '/test-url';
    }

    public function makeResponseDTO(ResponseInterface $response): ResponseDTO
    {
        return new TestResponse($response);
    }

    public function getQueryParams(): array
    {
        return [
            'param1' => 'value1',
            'param2' => ['x', 'y'],
        ];
    }

    public function getBody() :array
    {
        return [
            'body_1' => 'body-value1',
            'body_array' => ['a', 'b', 'c'],
        ];
    }
}