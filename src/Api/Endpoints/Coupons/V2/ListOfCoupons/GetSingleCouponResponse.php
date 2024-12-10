<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\ListOfCoupons;

use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;

class GetSingleCouponResponse extends ResponseDTO
{
    public function getCoupon(): Coupon
    {
        return CouponDTOFactory::createCoupon($this->getParsedBody());
    }
}