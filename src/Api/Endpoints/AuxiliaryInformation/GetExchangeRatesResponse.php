<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\ExchangeRate;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;

class GetExchangeRatesResponse extends ResponseDTO
{
    public function getExchangeRate(): ExchangeRate
    {
        return new ExchangeRate($this->getParsedBody());
    }
}