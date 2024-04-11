<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Coupon;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;

class GetSingleResponse extends ResponseDTO
{
    public function getCoupon()
    {
        return new Coupon($this->getParsedBody());
    }
}