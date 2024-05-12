<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\DeeplinkGeneration;

use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;

class GenerateDeeplinkResponse extends ResponseDTO
{
    public function getDeeplinks(): array
    {
        return $this->getParsedBody();
    }
}