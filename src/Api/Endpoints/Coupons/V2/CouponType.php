<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2;

class CouponType
{
    public function __construct(
        public int $id,
        public string $name,
    ){}
}