<?php

namespace Tests\Unit\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetCouponsList;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetCouponsListResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetCouponsListTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetCouponsList(
            campaign: 3,
            category: 1,
            campaignCategory: 89,
            type: 14,
            search: 'search-string',
            dateStart: new \DateTime('2024-04-10T00:00:00'),
            dateEnd: new \DateTime('2024-04-14T00:00:00'),
            offset: 0,
            limit: 20,
            orderBy: 'type',
            region: 'RU',
            language: 'de',
        );

        $this->assertSame('/coupons/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'campaign' => 3,
            'category' => 1,
            'campaignCategory' => 89,
            'type' => 14,
            'search' => 'search-string',
            'date_start' => '10.04.2024',
            'date_end' => '14.04.2024',
            'limit' => 20,
            'order_by' => 'type',
            'region' => 'RU',
            'language' => 'de',
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetCouponsListResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}