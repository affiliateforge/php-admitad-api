<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2;

class Campaign
{
    public function __construct(
        public int $id,
        public string $name,
        public string $siteUrl,
    ){}
}