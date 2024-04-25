<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities;

class ExchangeRate
{
    public function __construct(
        private readonly array $data
    ){}

    public function getDate(): \DateTime
    {
        return new \DateTime($this->data['date']);
    }

    public function getFromCurrencyCode(): string
    {
        return $this->data['base'];
    }

    public function getToCurrencyCode(): string
    {
        return $this->data['target'];
    }

    public function getRate(): float
    {
        return (float) $this->data['rate'];
    }
}