<?php

namespace Tests\Unit\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleCouponCategory;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleCouponCategoryResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetSingleCouponCategoryTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetSingleCouponCategory(3);

        $this->assertSame('/coupons/categories/3/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetSingleCouponCategoryResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}