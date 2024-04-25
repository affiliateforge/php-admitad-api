<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\AffiliateProgramCategory;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;

class GetAffiliateProgramCategoryResponse extends ResponseDTO
{
    public function getCategory(): AffiliateProgramCategory
    {
        return new AffiliateProgramCategory($this->getParsedBody());
    }
}