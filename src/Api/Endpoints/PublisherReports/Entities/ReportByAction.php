<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByActions\Position;

class ReportByAction
{
    public function __construct(
        private readonly array $data
    ){}

    public function getId(): int
    {
        return $this->data['id'];
    }

    public function getOrderId(): string
    {
        return $this->data['order_id'];
    }

    public function getTariffId(): int
    {
        return $this->data['tariff_id'];
    }

    public function getActionId(): int
    {
        return $this->data['action_id'];
    }

    public function getAdvcampaignId(): int
    {
        return $this->data['advcampaign_id'];
    }

    public function getAdvcampaignName(): string
    {
        return $this->data['advcampaign_name'];
    }

    public function getWebsiteName(): string
    {
        return $this->data['website_name'];
    }

    public function getClickUserIp(): ?string
    {
        return $this->data['click_user_ip'];
    }

    public function getClickUserReferer(): string
    {
        return $this->data['click_user_referer'];
    }

    public function getClickCountryCode(): ?string
    {
        return $this->data['click_country_code'];
    }

    public function getConversionTime(): int
    {
        return $this->data['conversion_time'];
    }

    public function getAction(): string
    {
        return $this->data['action'];
    }

    public function getActionType(): string
    {
        return $this->data['action_type'];
    }

    public function getCart(): float
    {
        return $this->data['cart'];
    }

    public function getStatus(): string
    {
        return $this->data['status'];
    }

    public function getProcessed(): int
    {
        return $this->data['processed'];
    }

    public function getSubid(): string
    {
        return $this->data['subid'];
    }

    public function getSubid1(): ?string
    {
        return $this->data['subid1'];
    }

    public function getSubid2(): ?string
    {
        return $this->data['subid2'];
    }

    public function getSubid3(): ?string
    {
        return $this->data['subid3'];
    }

    public function getSubid4(): ?string
    {
        return $this->data['subid4'];
    }

    public function getPayment(): float
    {
        return $this->data['payment'];
    }

    public function getCurrency(): string
    {
        return $this->data['currency'];
    }

    public function getKeyword(): ?string
    {
        return $this->data['keyword'];
    }

    public function getComment(): ?string
    {
        return $this->data['comment'];
    }

    /**
     * @return array<Position>
     */
    public function getPositions(): array
    {
        return array_map(fn ($item) => new Position($item), $this->data['positions']);
    }

    public function getPaid(): int
    {
        return $this->data['paid'];
    }

    public function getPromocode(): ?string
    {
        return $this->data['promocode'];
    }

    public function getClickDate(): string
    {
        return $this->data['click_date'];
    }

    public function getActionDate(): string
    {
        return $this->data['action_date'];
    }

    public function getClosingDate(): string
    {
        return $this->data['closing_date'];
    }

    public function getStatusUpdated(): string
    {
        return $this->data['status_updated'];
    }
}