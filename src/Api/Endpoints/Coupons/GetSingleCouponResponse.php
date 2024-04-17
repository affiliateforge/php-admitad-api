<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Coupon;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;

class GetSingleCouponResponse extends ResponseDTO
{
    public function getCoupon(): Coupon
    {
        return new Coupon($this->getParsedBody());
    }
}