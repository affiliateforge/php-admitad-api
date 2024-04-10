<?php

namespace Affiliateforge\PhpAdmitadApi\Api;

use Psr\Http\Message\ResponseInterface;

class ResponseMetaDTO
{
    public function __construct(
        private readonly array $meta
    ){}

    public function getCount(): int
    {
        return $this->meta['count'];
    }

    public function getLimit(): int
    {
        return $this->meta['limit'];
    }

    public function getOffset(): int
    {
        return $this->meta['offset'];
    }
}