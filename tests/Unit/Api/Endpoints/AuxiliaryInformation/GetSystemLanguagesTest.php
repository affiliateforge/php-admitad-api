<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemLanguages;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemLanguagesResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetSystemLanguagesTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetSystemLanguages(
            offset: 4,
            limit: 1,
        );

        $this->assertSame('/languages/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'offset' => 4,
            'limit' => 1,
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetSystemLanguagesResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}