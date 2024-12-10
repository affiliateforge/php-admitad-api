<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\ListOfCoupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\Campaign;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\CouponCategory;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\CouponType;
use Carbon\Carbon;

class CouponDTOFactory
{
    public static function createCoupon(array $data): Coupon
    {
        $campaign = new Campaign($data['campaign']['id'], $data['campaign']['name'], $data['campaign']['site_url']);
        $dateStart = Carbon::parse($data['date_start']);
        $dateEnd = !empty($data['date_end']) ? Carbon::parse($data['date_end']) : null;
        $couponTypes = array_map(fn (array $item) => new CouponType($item['id'], $item['name']), $data['types']);
        $couponCategories = array_map(fn (array $item) => new CouponCategory($item['id'], $item['name']), $data['categories']);

        return new Coupon(
            $data['status'],
            $data['rating'],
            $campaign,
            $data['description'],
            $data['short_name'],
            $data['exclusive'],
            $dateStart,
            $dateEnd,
            $data['id'],
            $data['regions'],
            $data['discount'],
            $couponTypes,
            $data['image'],
            $data['species'],
            $couponCategories,
            $data['name'],
            $data['language'],
            $data['is_unique'],
            $data['is_personal'],
        );
    }
}