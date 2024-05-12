<?php

namespace Tests\Unit\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleAdSpaceCoupon;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleAdSpaceCouponResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetSingleAdSpaceCouponTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetSingleAdSpaceCoupon(3, 2);

        $this->assertSame('/coupons/3/website/2/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetSingleAdSpaceCouponResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}