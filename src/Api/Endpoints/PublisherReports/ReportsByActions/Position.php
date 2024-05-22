<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByActions;

class Position
{
    public function __construct(
        protected readonly array $data
    ){}

    public function getId(): int
    {
        return $this->data['id'];
    }

    public function getTariffId(): int
    {
        return $this->data['tariff_id'];
    }

    public function getPayment(): float
    {
        return $this->data['payment'];
    }

    public function getRateId(): int
    {
        return $this->data['rate_id'];
    }

    public function getRate(): ?float
    {
        return $this->data['rate'];
    }

    public function getDatetime(): \DateTime
    {
        return new \DateTime($this->data['datetime']);
    }

    public function getAmount(): float
    {
        return $this->data['amount'];
    }

    public function getPercentage(): bool
    {
        return $this->data['percentage'];
    }

    public function getProductId(): string
    {
        return $this->data['product_id'];
    }

    public function getProductUrl(): string
    {
        return $this->data['product_url'];
    }

    public function getProductImage(): string
    {
        return $this->data['product_image'];
    }

    public function getProductName(): string
    {
        return $this->data['product_name'];
    }

    public function getProductCategoryId(): string
    {
        return $this->data['product_category_id'];
    }

    public function getProductCategoryName(): string
    {
        return $this->data['product_category_name'];
    }
}