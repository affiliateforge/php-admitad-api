<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities;

class AffiliateProgramCategory
{
    public function __construct(
        private readonly array $data
    ){}

    public function getId(): int
    {
        return $this->data['id'];
    }

    public function getName(): string
    {
        return $this->data['name'];
    }

    public function getLanguage(): string
    {
        return $this->data['language'];
    }

    public function getParent(): ?static
    {
        return $this->data['parent'] ? new static($this->data['parent']) : null;
    }
}