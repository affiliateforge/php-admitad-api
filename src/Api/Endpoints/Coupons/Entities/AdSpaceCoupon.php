<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities;

use Exception;

class AdSpaceCoupon
{
    public function __construct(
        private readonly array $data
    ){}

    public function getStatus(): string
    {
        return $this->data['status'];
    }

    public function getRating(): float
    {
        return (float) $this->data['rating'];
    }

    public function getCampaign(): Campaign
    {
        return new Campaign($this->data['campaign']);
    }

    public function getDescription(): ?string
    {
        return $this->data['description'];
    }

    public function getShortName(): string
    {
        return $this->data['short_name'];
    }

    public function isExclusive(): bool
    {
        return $this->data['exclusive'];
    }

    /**
     * @throws Exception
     */
    public function getDateStart(): \DateTime
    {
        return new \DateTime($this->data['date_start']);
    }

    /**
     * @throws Exception
     */
    public function getDateEnd(): ?\DateTime
    {
        return is_null($this->data['date_end']) ? null : new \DateTime($this->data['date_end']);
    }

    public function getId(): int
    {
        return $this->data['id'];
    }

    public function getRegions(): array
    {
        return $this->data['regions'];
    }

    public function getDiscount(): ?string
    {
        return $this->data['discount'] ?? null;
    }

    /**
     * @return array<Type>
     */
    public function getTypes(): array
    {
        return array_map(
            fn(array $item) => new Type($item),
            $this->data['types']
        );
    }

    public function getImage(): string
    {
        return $this->data['image'];
    }

    public function getSpecies(): string
    {
        return $this->data['species'];
    }

    /**
     * @return array<Category>
     */
    public function getCategories(): array
    {
        return array_map(
            fn(array $item) => new Category($item),
            $this->data['categories']
        );
    }

    public function getName(): string
    {
        return $this->data['name'];
    }

    public function getLanguage(): string
    {
        return $this->data['language'];
    }

    public function isUnique(): bool
    {
        return $this->data['is_unique'];
    }

    public function isPersonal(): bool
    {
        return $this->data['is_personal'];
    }

    public function getFramesetLink(): string
    {
        return $this->data['frameset_link'];
    }

    public function getGotoLink(): string
    {
        return $this->data['goto_link'];
    }

    public function getPromocode(): string
    {
        return $this->data['promocode'];
    }
}