<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities;

class ReportByKeyword
{
    public function __construct(
        private readonly array $data
    ){}

    public function getKeyword(): string
    {
        return $this->data['keyword'];
    }

    public function getClicks(): int
    {
        return $this->data['clicks'];
    }

    public function getEcpc(): float
    {
        return $this->data['ecpc'];
    }

    public function getCr(): float
    {
        return $this->data['cr'];
    }

    public function getLeadsSum(): int
    {
        return $this->data['leads_sum'];
    }

    public function getSalesSum(): int
    {
        return $this->data['sales_sum'];
    }

    public function getPaymentSumDeclined(): float
    {
        return $this->data['payment_sum_declined'];
    }

    public function getPaymentSumOpen(): float
    {
        return $this->data['payment_sum_open'];
    }

    public function getPaymentSumApproved(): float
    {
        return $this->data['payment_sum_approved'];
    }

    public function getCurrency(): string
    {
        return $this->data['currency'];
    }
}