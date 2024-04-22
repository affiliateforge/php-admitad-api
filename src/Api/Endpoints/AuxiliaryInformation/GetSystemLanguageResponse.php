<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\SystemLanguage;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;

class GetSystemLanguageResponse extends ResponseDTO
{
    public function getLanguage(): SystemLanguage
    {
        return new SystemLanguage($this->getParsedBody());
    }
}