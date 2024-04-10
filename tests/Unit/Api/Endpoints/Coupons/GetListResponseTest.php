<?php

namespace Tests\Unit\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Coupon;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetListResponse;
use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetListResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"_meta":{"count":1747,"limit":1,"offset":0},"results":[{"status":"active","rating":"0.00","campaign":{"id":18018,"name":"Megamart","site_url":"https://megamart.com"},"description":"description","short_name":"short name","exclusive":false,"date_end":"2024-04-14T23:59:00","date_start":"2024-04-10T00:00:00","id":777,"regions":["RU"],"discount":"1 500 ₽","types":[{"id":2,"name":"Discount on an order"}],"image":"http://cdn.admitad.com/campaign/images/2023/8/1/tratata.svg","species":"promocode","categories":[{"id":8,"name":"Computers & Electronics"}],"name":"name","language":"ru","is_unique":false,"is_personal":false}]}
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new GetListResponse($response);

        $this->assertInstanceOf(ResponseMetaDTO::class, $dto->getMeta());
        $this->assertSame(1747, $dto->getMeta()->getCount());
        $this->assertSame(1, $dto->getMeta()->getLimit());
        $this->assertSame(0, $dto->getMeta()->getOffset());

        $this->assertIsArray($dto->getResults());
        $this->assertCount(1, $dto->getResults());
        $this->assertInstanceOf(Coupon::class, $dto->getResults()[0]);
        $this->assertSame(777, $dto->getResults()[0]->getId());
    }
}