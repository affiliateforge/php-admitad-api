<?php

namespace Tests\Unit\Api\Endpoints\Coupons\Entities;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Campaign;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Category;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Coupon;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Type;
use PHPUnit\Framework\TestCase;

class CouponTest extends TestCase
{
    public function testGetters()
    {
        $singleCouponResponseJson = <<<JSON
{"status":"active","rating":"0.00","campaign":{"id":18018,"name":"Megamart","site_url":"https://megamart.com"},"description":"Super long description","short_name":"short name","exclusive":false,"date_end": null,"date_start":"2024-04-10T00:00:00","id":777,"regions":["RU"],"discount":"1 500 ₽","types":[{"id":2,"name":"Discount on an order"}],"image":"http://cdn.admitad.com/campaign/images/tratata.svg","species":"promocode","categories":[{"id":8,"name":"Computers & Electronics"}],"name":"Name","language":"ru","is_unique":false,"is_personal":false}
JSON;

        $dto = new Coupon(json_decode($singleCouponResponseJson, true));

        $this->assertSame('active', $dto->getStatus());
        $this->assertSame(0.00, $dto->getRating());
        $this->assertSame('Super long description', $dto->getDescription());
        $this->assertSame('short name', $dto->getShortName());
        $this->assertFalse($dto->isExclusive());
        $this->assertNull($dto->getDateEnd());
        $this->assertEquals(new \DateTime('2024-04-10T00:00:00'), $dto->getDateStart());
        $this->assertSame(777, $dto->getId());
        $this->assertEquals(['RU'], $dto->getRegions());
        $this->assertSame('1 500 ₽', $dto->getDiscount());
        $this->assertSame('http://cdn.admitad.com/campaign/images/tratata.svg', $dto->getImage());
        $this->assertSame('promocode', $dto->getSpecies());
        $this->assertSame('Name', $dto->getName());
        $this->assertSame('ru', $dto->getLanguage());
        $this->assertFalse($dto->isUnique());
        $this->assertFalse($dto->isPersonal());

        $this->assertInstanceOf(Campaign::class, $dto->getCampaign());
        $this->assertSame(18018, $dto->getCampaign()->getId());
        $this->assertSame('Megamart', $dto->getCampaign()->getName());
        $this->assertSame('https://megamart.com', $dto->getCampaign()->getSiteUrl());

        $this->assertIsArray($dto->getTypes());
        $this->assertCount(1, $dto->getTypes());
        $this->assertInstanceOf(Type::class, $dto->getTypes()[0]);
        $this->assertSame(2, $dto->getTypes()[0]->getId());
        $this->assertSame('Discount on an order', $dto->getTypes()[0]->getName());

        $this->assertIsArray($dto->getCategories());
        $this->assertCount(1, $dto->getCategories());
        $this->assertInstanceOf(Category::class, $dto->getCategories()[0]);
        $this->assertSame(8, $dto->getCategories()[0]->getId());
        $this->assertSame('Computers & Electronics', $dto->getCategories()[0]->getName());
    }
}