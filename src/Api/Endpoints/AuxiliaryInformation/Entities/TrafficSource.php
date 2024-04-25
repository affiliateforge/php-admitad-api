<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities;

class TrafficSource
{
    public function __construct(
        private readonly array $data
    ){}

    public function getName(): string
    {
        return $this->data['name'];
    }

    public function getId(): int
    {
        return $this->data['id'];
    }
}