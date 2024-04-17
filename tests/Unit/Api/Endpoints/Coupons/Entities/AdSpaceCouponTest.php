<?php

namespace Tests\Unit\Api\Endpoints\Coupons\Entities;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\AdSpaceCoupon;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Campaign;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Category;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Type;
use PHPUnit\Framework\TestCase;

class AdSpaceCouponTest extends TestCase
{
    public function testGetters()
    {
        $singleCouponResponseJson = <<<JSON
{"status":"active","rating":"4.82","campaign":{"id":777,"name":"Name","site_url":"https://www.example.com/"},"description":"","short_name":"Short name","exclusive":false,"date_end":"2024-05-31T23:59:00","date_start":"2024-03-01T00:00:00","id":3,"regions":["RU"],"discount":"500 ₽","types":[{"id":2,"name":"Full name"}],"image":"http://cdn.admitad.com/campaign/images/2021/4/5/tratata.svg","species":"promocode","categories":[{"id":1,"name":"Toys, Kids & Babies"}],"name":"Name","language":"ru","is_unique":false,"is_personal":false,"promocode":"promocode","frameset_link":"https://example.com/coupon/jgmk2fspjv767c32d944748f778371/?erid=adF","goto_link":"https://example.com/g/asd/?i=3&erid=adF"}
JSON;

        $dto = new AdSpaceCoupon(json_decode($singleCouponResponseJson, true));

        $this->assertSame('active', $dto->getStatus());
        $this->assertSame(4.82, $dto->getRating());
        $this->assertSame('', $dto->getDescription());
        $this->assertSame('Short name', $dto->getShortName());
        $this->assertFalse($dto->isExclusive());
        $this->assertEquals(new \DateTime('2024-05-31T23:59:00'), $dto->getDateEnd());
        $this->assertEquals(new \DateTime('2024-03-01T00:00:00'), $dto->getDateStart());
        $this->assertSame(3, $dto->getId());
        $this->assertEquals(['RU'], $dto->getRegions());
        $this->assertSame('500 ₽', $dto->getDiscount());
        $this->assertSame('http://cdn.admitad.com/campaign/images/2021/4/5/tratata.svg', $dto->getImage());
        $this->assertSame('promocode', $dto->getSpecies());
        $this->assertSame('Name', $dto->getName());
        $this->assertSame('ru', $dto->getLanguage());
        $this->assertFalse($dto->isUnique());
        $this->assertFalse($dto->isPersonal());
        $this->assertSame('https://example.com/coupon/jgmk2fspjv767c32d944748f778371/?erid=adF', $dto->getFramesetLink());
        $this->assertSame('https://example.com/g/asd/?i=3&erid=adF', $dto->getGotoLink());
        $this->assertSame('promocode', $dto->getPromocode());

        $this->assertInstanceOf(Campaign::class, $dto->getCampaign());
        $this->assertSame(777, $dto->getCampaign()->getId());
        $this->assertSame('Name', $dto->getCampaign()->getName());
        $this->assertSame('https://www.example.com/', $dto->getCampaign()->getSiteUrl());

        $this->assertIsArray($dto->getTypes());
        $this->assertCount(1, $dto->getTypes());
        $this->assertInstanceOf(Type::class, $dto->getTypes()[0]);
        $this->assertSame(2, $dto->getTypes()[0]->getId());
        $this->assertSame('Full name', $dto->getTypes()[0]->getName());

        $this->assertIsArray($dto->getCategories());
        $this->assertCount(1, $dto->getCategories());
        $this->assertInstanceOf(Category::class, $dto->getCategories()[0]);
        $this->assertSame(1, $dto->getCategories()[0]->getId());
        $this->assertSame('Toys, Kids & Babies', $dto->getCategories()[0]->getName());
    }
}