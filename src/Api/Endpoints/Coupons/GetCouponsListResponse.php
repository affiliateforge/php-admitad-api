<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Coupon;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;
use Psr\Http\Message\ResponseInterface;

class GetCouponsListResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<Coupon>
     */
    public function getResults(): array
    {
        return array_map(
            fn (array $item) => new Coupon($item),
            $this->getParsedBody()['results']
        );
    }
}