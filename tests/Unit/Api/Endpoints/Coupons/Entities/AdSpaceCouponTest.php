<?php

namespace Tests\Unit\Api\Endpoints\Coupons\Entities;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\AdSpaceCoupon;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Campaign;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Category;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Type;
use Exception;
use Generator;
use PHPUnit\Framework\TestCase;

class AdSpaceCouponTest extends TestCase
{
    /**
     * @return void
     * @dataProvider gettersDataProvider
     * @throws Exception
     */
    public function testGetters(array $coupon)
    {
        $dto = new AdSpaceCoupon($coupon);

        $this->assertSame($coupon['status'], $dto->getStatus());
        $this->assertSame((float)$coupon['rating'], $dto->getRating());
        $this->assertSame($coupon['description'], $dto->getDescription());
        $this->assertSame($coupon['short_name'], $dto->getShortName());

        $this->assertIsBool($dto->isExclusive());
        $this->assertSame($coupon['exclusive'], $dto->isExclusive());

        if (is_null($coupon['date_end'])) {
            $this->assertNull($dto->getDateEnd());
        } else {
            $this->assertEquals(new \DateTime($coupon['date_end']), $dto->getDateEnd());
        }

        $this->assertEquals(new \DateTime($coupon['date_start']), $dto->getDateStart());
        $this->assertSame($coupon['id'], $dto->getId());
        $this->assertEquals($coupon['regions'], $dto->getRegions());
        $this->assertSame($coupon['discount'], $dto->getDiscount());
        $this->assertSame($coupon['image'], $dto->getImage());
        $this->assertSame($coupon['species'], $dto->getSpecies());
        $this->assertSame($coupon['name'], $dto->getName());
        $this->assertSame($coupon['language'], $dto->getLanguage());

        $this->assertIsBool($dto->isUnique());
        $this->assertSame($coupon['is_unique'], $dto->isUnique());

        $this->assertIsBool($dto->isPersonal());
        $this->assertSame($coupon['frameset_link'], $dto->getFramesetLink());
        $this->assertSame($coupon['goto_link'], $dto->getGotoLink());
        $this->assertSame($coupon['promocode'], $dto->getPromocode());

        $this->assertInstanceOf(Campaign::class, $dto->getCampaign());
        $this->assertSame($coupon['campaign']['id'], $dto->getCampaign()->getId());
        $this->assertSame($coupon['campaign']['name'], $dto->getCampaign()->getName());
        $this->assertSame($coupon['campaign']['site_url'], $dto->getCampaign()->getSiteUrl());

        $this->assertIsArray($dto->getTypes());
        $this->assertCount(count($coupon['types']), $dto->getTypes());
        foreach ($dto->getTypes() as $i => $type) {
            $this->assertInstanceOf(Type::class, $type);
            $this->assertSame($coupon['types'][$i]['id'], $type->getId());
            $this->assertSame($coupon['types'][$i]['name'], $type->getName());
        }

        $this->assertIsArray($dto->getCategories());
        $this->assertCount(count($coupon['categories']), $dto->getCategories());
        foreach ($dto->getCategories() as $i => $category) {
            $this->assertInstanceOf(Category::class, $category);
            $this->assertSame($coupon['categories'][$i]['id'], $category->getId());
            $this->assertSame($coupon['categories'][$i]['name'], $category->getName());
        }
    }


    static function gettersDataProvider(): Generator
    {
        foreach (json_decode(
            file_get_contents(__DIR__ . '/fixtures/adspace-coupons.json'),
            true
        ) as $coupon) {
            yield [ $coupon ];
        }
    }
}