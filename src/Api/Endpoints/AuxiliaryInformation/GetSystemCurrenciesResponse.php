<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\SystemCurrency;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetSystemCurrenciesResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<SystemCurrency>
     */
    public function getResults(): array
    {
        return array_map(
            fn (array $item) => new SystemCurrency($item),
            $this->getParsedBody()['results'],
        );
    }
}