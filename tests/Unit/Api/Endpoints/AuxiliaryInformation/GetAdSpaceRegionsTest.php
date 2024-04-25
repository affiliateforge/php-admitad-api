<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAdSpaceRegions;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAdSpaceRegionsResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetAdSpaceRegionsTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetAdSpaceRegions(
            offset: 4,
            limit: 1,
        );

        $this->assertSame('/websites/regions/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'offset' => 4,
            'limit' => 1,
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetAdSpaceRegionsResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}