<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\ListOfCoupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\Campaign;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\CouponCategory;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\CouponType;
use Carbon\Carbon;

class Coupon
{
    public string   $status;
    public float    $rating;
    public Campaign $campaign;
    public ?string  $description;
    public string   $shortName;
    public bool     $isExclusive;
    public Carbon   $dateStart;
    public ?Carbon  $dateEnd;
    public int      $id;
    public array    $regions;
    public ?string  $discount;
    /** @var array<CouponType> $types */
    public array    $types;
    public string   $image;
    public string   $species;
    /** @var array<CouponCategory> $categories */
    public array    $categories;
    public string   $name;
    public string   $language;
    public bool     $isUnique;
    public bool     $isPersonal;

    public function __construct(
        string  $status,
        float   $rating,
        array   $campaignData,
        ?string $description,
        string  $shortName,
        bool    $isExclusive,
        string  $dateStart,
        ?string $dateEnd,
        int     $id,
        array   $regions,
        ?string $discount,
        array   $types,
        string  $image,
        string  $species,
        array   $categories,
        string  $name,
        string  $language,
        bool    $isUnique,
        bool    $isPersonal,
    )
    {
        $this->status = $status;
        $this->rating = $rating;
        $this->campaign = new Campaign($campaignData['id'], $campaignData['name'], $campaignData['site_url']);
        $this->description = $description;
        $this->shortName = $shortName;
        $this->isExclusive = $isExclusive;
        $this->dateStart = Carbon::parse($dateStart);
        $this->dateEnd = $dateEnd ? Carbon::parse($dateEnd) : null;
        $this->id = $id;
        $this->regions = $regions;
        $this->discount = $discount;
        $this->types = array_map(fn (array $item) => new CouponType($item['id'], $item['name']), $types);
        $this->image = $image;
        $this->species = $species;
        $this->categories = array_map(fn (array $item) => new CouponCategory($item['id'], $item['name']), $categories);
        $this->name = $name;
        $this->language = $language;
        $this->isUnique = $isUnique;
        $this->isPersonal = $isPersonal;
    }
}