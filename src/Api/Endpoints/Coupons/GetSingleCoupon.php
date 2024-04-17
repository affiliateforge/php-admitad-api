<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Psr\Http\Message\ResponseInterface;

class GetSingleCoupon extends CommandDTO
{
    use GET;

    public function __construct(
        private readonly int $id
    ){}

    public function getUrlPath(): string
    {
        return "/coupons/$this->id/";
    }

    public function makeResponseDTO(ResponseInterface $response): GetSingleCouponResponse
    {
        return new GetSingleCouponResponse($response);
    }
}