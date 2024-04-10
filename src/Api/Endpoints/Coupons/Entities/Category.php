<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities;

class Category
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
}