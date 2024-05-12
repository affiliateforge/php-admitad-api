<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetAdSpaceTypesResponse extends ResponseDTO
{
    use HasMetaInResponse;

    public function getResults(): array
    {
        return $this->getParsedBody()['results'];
    }
}