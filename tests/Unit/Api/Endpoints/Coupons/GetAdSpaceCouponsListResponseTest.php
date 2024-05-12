<?php

namespace Tests\Unit\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\AdSpaceCoupon;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetAdSpaceCouponsListResponse;
use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetAdSpaceCouponsListResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"_meta":{"count":8,"limit":1,"offset":0},"results":[{"status":"active","rating":"4.82","campaign":{"id":2930,"name":"Акушерство","site_url":"https://www.akusherstvo.ru/"},"description":"","short_name":"short name","exclusive":false,"date_end":"2024-05-31T23:59:00","date_start":"2024-03-01T00:00:00","id":670284,"regions":["RU"],"discount":"500 ₽","types":[{"id":2,"name":"Discount on an order"}],"image":"http://cdn.admitad.com/campaign/images/2021/4/5/tratata.svg","species":"promocode","categories":[{"id":1,"name":"Toys, Kids & Babies"}],"name":"Full name","language":"ru","is_unique":false,"is_personal":false,"promocode":"promo","frameset_link":"https://example.com/coupon/asdf51/?erid=Asd","goto_link":"https://example.com/g/path/?i=3&erid=Asd"}]}
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new GetAdSpaceCouponsListResponse($response);

        $this->assertInstanceOf(ResponseMetaDTO::class, $dto->getMeta());
        $this->assertSame(8, $dto->getMeta()->getCount());
        $this->assertSame(1, $dto->getMeta()->getLimit());
        $this->assertSame(0, $dto->getMeta()->getOffset());

        $this->assertIsArray($dto->getResults());
        $this->assertCount(1, $dto->getResults());
        $this->assertInstanceOf(AdSpaceCoupon::class, $dto->getResults()[0]);

        $this->assertSame(4.82, $dto->getResults()[0]->getRating());
    }
}