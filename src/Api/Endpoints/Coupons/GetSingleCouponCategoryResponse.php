<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Category;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;

class GetSingleCouponCategoryResponse extends ResponseDTO
{
    public function getCategory(): Category
    {
        return new Category($this->getParsedBody());
    }
}