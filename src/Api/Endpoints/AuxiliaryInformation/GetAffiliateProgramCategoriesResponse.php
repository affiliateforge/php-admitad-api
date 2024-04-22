<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\AffiliateProgramCategory;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetAffiliateProgramCategoriesResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<AffiliateProgramCategory>
     */
    public function getResults(): array
    {
        return array_map(
            fn (array $item) => new AffiliateProgramCategory($item),
            $this->getParsedBody()['results'],
        );
    }
}