<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities;

class ReportForAffiliateProgram
{
    public function __construct(
        private readonly array $data
    ){}

    public function getAdvCampaignId(): int
    {
        return $this->data['advcampaign_id'];
    }

    public function getAdvCampaignName(): string
    {
        return $this->data['advcampaign_name'];
    }

    public function getViews(): int
    {
        return $this->data['views'];
    }

    public function getClicks(): int
    {
        return $this->data['clicks'];
    }

    public function getCTR(): float
    {
        return $this->data['ctr'];
    }

    public function getECPC(): float
    {
        return $this->data['ecpc'];
    }

    public function getECPM(): float
    {
        return $this->data['ecpm'];
    }

    public function getCR(): float
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

    public function getCurrency(): string
    {
        return $this->data['currency'];
    }
}