<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetTrafficSources;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetTrafficSourcesResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetTrafficSourcesTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetTrafficSources(
            offset: 4,
            limit: 1,
        );

        $this->assertSame('/traffic/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'offset' => 4,
            'limit' => 1,
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetTrafficSourcesResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}