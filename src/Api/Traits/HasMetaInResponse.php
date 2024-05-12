<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Traits;

use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;

trait HasMetaInResponse
{
    public function getMeta(): ResponseMetaDTO
    {
        return new ResponseMetaDTO($this->getParsedBody()['_meta']);
    }
}