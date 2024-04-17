<?php

namespace Tests\Unit\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Category;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleCouponCategoryResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetSingleCouponCategoryResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"id":3,"name":"Accessories & Bags"}
JSON;

        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));

        $dto = new GetSingleCouponCategoryResponse($response);
        $this->assertInstanceOf(Category::class, $dto->getCategory());
        $this->assertSame(3, $dto->getCategory()->getId());
    }
}