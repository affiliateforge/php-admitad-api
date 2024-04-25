<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities;

class SystemCurrency
{
    public function __construct(
        private readonly array $data
    ){}

    public function getCode(): string
    {
        return $this->data['code'];
    }

    public function getMinSum(): float
    {
        return (float) $this->data['min_sum'];
    }

    public function getName(): string
    {
        return $this->data['name'];
    }

    public function getSign(): string
    {
        return $this->data['sign'];
    }
}