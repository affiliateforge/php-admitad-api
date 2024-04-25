<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetExchangeRates;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetExchangeRatesResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetExchangeRatesTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetExchangeRates('RUB', 'USD', (new \DateTime())->setDate(2024, 4, 10));

        $this->assertSame('/currencies/rate/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetExchangeRatesResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}