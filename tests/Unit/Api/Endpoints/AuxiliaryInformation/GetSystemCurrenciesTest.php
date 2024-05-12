<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemCurrencies;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemCurrenciesResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetSystemCurrenciesTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetSystemCurrencies(
            offset: 4,
            limit: 1,
        );

        $this->assertSame('/currencies/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'offset' => 4,
            'limit' => 1,
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetSystemCurrenciesResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}