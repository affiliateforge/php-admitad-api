<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities;

class SystemLanguage
{
    public function __construct(
        private readonly array $data
    ){}

    public function getFlag(): string
    {
        return $this->data['flag'];
    }

    public function getLanguage(): string
    {
        return $this->data['language'];
    }

    public function getLanguageCode(): string
    {
        return $this->data['language_code'];
    }
}