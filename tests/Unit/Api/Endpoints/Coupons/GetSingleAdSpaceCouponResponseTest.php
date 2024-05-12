<?php

namespace Tests\Unit\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\AdSpaceCoupon;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleAdSpaceCouponResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetSingleAdSpaceCouponResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"status":"active","rating":"4.82","campaign":{"id":2930,"name":"Name","site_url":"https://www.example.com/"},"description":"","short_name":"Short name","exclusive":false,"date_end":"2024-05-31T23:59:00","date_start":"2024-03-01T00:00:00","id":3,"regions":["RU"],"discount":"500 ₽","types":[{"id":2,"name":"Full name"}],"image":"http://cdn.admitad.com/campaign/images/2021/4/5/tratata.svg","species":"promocode","categories":[{"id":1,"name":"Toys, Kids & Babies"}],"name":"Name","language":"ru","is_unique":false,"is_personal":false,"promocode":"promocode","frameset_link":"https://example.com/coupon/jgmk2fspjv767c32d944748f778371/?erid=adF","goto_link":"https://example.com/g/asd/?i=3&erid=adF"}
JSON;

        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));

        $dto = new GetSingleAdSpaceCouponResponse($response);
        $this->assertInstanceOf(AdSpaceCoupon::class, $dto->getAdSpaceCoupon());
        $this->assertSame(3, $dto->getAdSpaceCoupon()->getId());
    }
}