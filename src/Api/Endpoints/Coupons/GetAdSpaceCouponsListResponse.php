<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\AdSpaceCoupon;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetAdSpaceCouponsListResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<AdSpaceCoupon>
     */
    public function getResults(): array
    {
        return array_map(
            fn (array $item) => new AdSpaceCoupon($item),
            $this->getParsedBody()['results']
        );
    }
}