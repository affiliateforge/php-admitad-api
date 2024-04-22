<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\SystemLanguage;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetSystemLanguagesResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<SystemLanguage>
     */
    public function getResults(): array
    {
        return array_map(
            fn ($item) => new SystemLanguage($item),
            $this->getParsedBody()['results'],
        );
    }
}