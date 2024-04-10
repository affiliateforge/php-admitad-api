<?php

namespace Tests\Unit\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingle;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetSingleTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetSingle(3);

        $this->assertSame('/coupons/3/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetSingleResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}