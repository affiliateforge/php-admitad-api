<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Category;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetCouponCategoriesListResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<Category>
     */
    public function getResults(): array
    {
        return array_map(
            fn (array $item) => new Category($item),
            $this->getParsedBody()['results']
        );
    }
}