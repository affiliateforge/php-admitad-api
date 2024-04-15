<?php

namespace Tests\Unit\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleCoupon;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleCouponResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetSingleCouponTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetSingleCoupon(3);

        $this->assertSame('/coupons/3/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetSingleCouponResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}