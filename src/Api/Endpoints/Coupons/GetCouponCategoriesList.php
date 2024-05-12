<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Psr\Http\Message\ResponseInterface;

class GetCouponCategoriesList extends CommandDTO
{
    use GET;

    public function __construct(
        private readonly ?int $offset = null,
        private readonly ?int $limit = null,
    ){}

    public function getUrlPath(): string
    {
        return '/coupons/categories/';
    }

    public function getQueryParams(): array
    {
        $params = [
            'offset' => $this->offset,
            'limit' => $this->limit,
        ];

        return array_filter($params);
    }

    public function makeResponseDTO(ResponseInterface $response): GetCouponCategoriesListResponse
    {
        return new GetCouponCategoriesListResponse($response);
    }
}