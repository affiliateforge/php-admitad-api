<?php

namespace Tests\Unit\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Coupon;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetSingleResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"status":"active","rating":"0.00","campaign":{"id":777,"name":"Megamart","site_url":"https://megamart.com"},"description":"megamart","short_name":"short name","exclusive":false,"date_end":"2024-04-14T23:59:00","date_start":"2024-04-10T00:00:00","id":684273,"regions":["RU"],"discount":"1 500 ₽","types":[{"id":2,"name":"Discount on an order"}],"image":"http://cdn.admitad.com/campaign/images/2023/8/1/tratata.svg","species":"promocode","categories":[{"id":8,"name":"Computers & Electronics"}],"name":"Name","language":"ru","is_unique":false,"is_personal":false}
JSON;

        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));

        $dto = new GetSingleResponse($response);
        $this->assertInstanceOf(Coupon::class, $dto->getCoupon());
        $this->assertSame('active', $dto->getCoupon()->getStatus());
    }
}