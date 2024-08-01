<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\V2\ListOfCoupons;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Carbon\Carbon;
use Psr\Http\Message\ResponseInterface;

class GetListOfCoupons extends CommandDTO
{
    use GET;

    public function __construct(
        private ?int $campaign = null,
        private ?int $category = null,
        private ?int $campaignCategory = null,
        private ?int $type = null,
        private ?string $search = null,
        private ?Carbon $dateStart = null,
        private ?Carbon $dateEnd = null,
        private ?int $offset = null,
        private ?int $limit = null,
        private ?string $orderBy = null,
        private ?string $region = null,
        private ?string $language = null,
    ){}

    public function getUrlPath(): string
    {
        return '/coupons/';
    }

    public function getQueryParams(): array
    {
        $params = [
            'campaign' => $this->campaign,
            'category' => $this->category,
            'campaignCategory' => $this->campaignCategory,
            'type' => $this->type,
            'search' => $this->search,
            'date_start' => $this->dateStart?->format('d.m.Y'),
            'date_end' => $this->dateEnd?->format('d.m.Y'),
            'offset' => $this->offset,
            'limit' => $this->limit,
            'order_by' => $this->orderBy,
            'region' => $this->region,
            'language' => $this->language,
        ];

        return array_filter($params);
    }

    public function makeResponseDTO(ResponseInterface $response): ResponseDTO
    {
        return new GetListOfCouponsResponse($response);
    }
}