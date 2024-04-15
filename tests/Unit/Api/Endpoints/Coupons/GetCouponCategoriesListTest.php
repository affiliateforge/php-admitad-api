<?php

namespace Tests\Unit\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetCouponCategoriesList;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetCouponCategoriesListResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetCouponCategoriesListTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetCouponCategoriesList(offset: 2, limit: 20);

        $this->assertSame('/coupons/categories/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'offset' => 2,
            'limit' => 20,
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetCouponCategoriesListResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}