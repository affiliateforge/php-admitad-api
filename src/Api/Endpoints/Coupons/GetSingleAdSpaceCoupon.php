<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Psr\Http\Message\ResponseInterface;

class GetSingleAdSpaceCoupon extends CommandDTO
{
    use GET;

    public function __construct(
        private readonly int $id,
        private readonly int $spaceId,
    ){}

    public function getUrlPath(): string
    {
        return "/coupons/$this->id/website/$this->spaceId/";
    }

    public function makeResponseDTO(ResponseInterface $response): GetSingleAdSpaceCouponResponse
    {
        return new GetSingleAdSpaceCouponResponse($response);
    }
}