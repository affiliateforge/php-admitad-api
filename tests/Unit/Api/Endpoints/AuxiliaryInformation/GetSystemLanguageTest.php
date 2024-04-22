<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemLanguage;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemLanguageResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetSystemLanguageTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetSystemLanguage('pl');

        $this->assertSame('/languages/pl/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetSystemLanguageResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}