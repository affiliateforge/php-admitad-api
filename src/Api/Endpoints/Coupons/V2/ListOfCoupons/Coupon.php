<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\ListOfCoupons;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\Campaign;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\CouponCategory;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\CouponType;
use Carbon\Carbon;

class Coupon
{
    public function __construct(
        public string   $status,
        public float    $rating,
        public Campaign $campaign,
        public ?string  $description,
        public string   $shortName,
        public bool     $isExclusive,
        public Carbon   $dateStart,
        public ?Carbon  $dateEnd,
        public int      $id,
        public array    $regions,
        public ?string  $discount,
        /** @var array<CouponType> $types */
        public array    $types,
        public string   $image,
        public string   $species,
        /** @var array<CouponCategory> $categories */
        public array    $categories,
        public string   $name,
        public string   $language,
        public bool     $isUnique,
        public bool     $isPersonal,
    ){}
}