<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities;

class AggregatedReport
{
    public function __construct(
        private readonly array $data
    ){}

    public function getViews(): int
    {
        return $this->data['views'];
    }

    public function getClicks(): int
    {
        return $this->data['clicks'];
    }

    public function getLeadsSum(): int
    {
        return $this->data['leads_sum'];
    }

    public function getSalesSum(): int
    {
        return $this->data['sales_sum'];
    }

    public function getActionsSumTotal(): int
    {
        return $this->data['actions_sum_total'];
    }

    public function getPaymentSumOpen(): float
    {
        return $this->data['payment_sum_open'];
    }

    public function getPaymentSumApproved(): float
    {
        return $this->data['payment_sum_approved'];
    }

    public function getPaymentSumDeclined(): float
    {
        return $this->data['payment_sum_declined'];
    }

    public function getPaymentSum(): float
    {
        return $this->data['payment_sum'];
    }

    public function getCurrency(): string
    {
        return $this->data['currency'];
    }

    public function getCR(): float
    {
        return $this->data['cr'];
    }

    public function getECPC(): float
    {
        return $this->data['ecpc'];
    }
}