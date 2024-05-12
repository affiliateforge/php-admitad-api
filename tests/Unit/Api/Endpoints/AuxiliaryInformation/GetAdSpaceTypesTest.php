<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAdSpaceTypes;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAdSpaceTypesResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetAdSpaceTypesTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetAdSpaceTypes(
            offset: 4,
            limit: 1,
        );

        $this->assertSame('/websites/kinds/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'offset' => 4,
            'limit' => 1,
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetAdSpaceTypesResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}