<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\ListOfCoupons;

use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetListOfCouponsResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<Coupon>
     */
    public function getResults(): array
    {
        return array_map(
            fn (array $item) => CouponDTOFactory::createCoupon($item),
            $this->getParsedBody()['results']
        );
    }
}