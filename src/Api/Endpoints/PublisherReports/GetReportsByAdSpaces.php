<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Psr\Http\Message\ResponseInterface;

class GetReportsByAdSpaces extends CommandDTO
{
    use GET;

    public function __construct(
        private readonly ?int $offset = null,
        private readonly ?int $limit = null,
        private readonly ?\DateTime $dateStart = null,
        private readonly ?\DateTime $dateEnd = null,
        private readonly ?int $website = null,
        private readonly ?int $campaign = null,
        private readonly ?string $subid = null,
        private readonly ?bool $total = null,
        private readonly ?string $orderBy = null,
    ){}

    public function getUrlPath(): string
    {
        return '/statistics/websites/';
    }

    public function getQueryParams(): array
    {
        $params = [
            'offset' => $this->offset,
            'limit' => $this->limit,
            'date_start' => $this->dateStart?->format('d.m.Y'),
            'date_end' => $this->dateEnd?->format('d.m.Y'),
            'website' => $this->website,
            'campaign' => $this->campaign,
            'subid' => $this->subid,
            'total' => $this->total,
            'order_by' => $this->orderBy,
        ];

        return array_filter($params);
    }

    public function makeResponseDTO(ResponseInterface $response): GetReportsByAdSpacesResponse
    {
        return new GetReportsByAdSpacesResponse($response);
    }
}