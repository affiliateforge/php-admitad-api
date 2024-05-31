<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\ListOfCoupons;

class CouponDTOFactory
{
    public static function createCoupon(array $data): Coupon
    {
        return new Coupon(
            $data['status'],
            $data['rating'],
            $data['campaign'],
            $data['description'],
            $data['short_name'],
            $data['exclusive'],
            $data['date_start'],
            $data['date_end'],
            $data['id'],
            $data['regions'],
            $data['discount'],
            $data['types'],
            $data['image'],
            $data['species'],
            $data['categories'],
            $data['name'],
            $data['language'],
            $data['is_unique'],
            $data['is_personal'],
        );
    }
}