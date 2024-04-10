<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;
use Psr\Http\Message\ResponseInterface;
use DateTime;

class GetList extends CommandDTO
{
    use GET;

    public function __construct(
        private readonly ?int $campaign = null,
        private readonly ?int $category = null,
        private readonly ?int $campaignCategory = null,
        private readonly ?int $type = null,
        private readonly ?string $search = null,
        private readonly ?DateTime $dateStart = null,
        private readonly ?DateTime $dateEnd = null,
        private readonly ?int $offset = null,
        private readonly ?int $limit = null,
        private readonly ?string $orderBy = null,
        private readonly ?string $region = null,
        private readonly ?string $language = null,
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

    public function makeResponseDTO(ResponseInterface $response): GetListResponse
    {
        return new GetListResponse($response);
    }
}