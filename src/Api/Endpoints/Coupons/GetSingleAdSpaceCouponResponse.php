<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\AdSpaceCoupon;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;

class GetSingleAdSpaceCouponResponse extends ResponseDTO
{
    public function getAdSpaceCoupon(): AdSpaceCoupon
    {
        return new AdSpaceCoupon($this->getParsedBody());
    }
}