<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\MonthlyReports;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Psr\Http\Message\ResponseInterface;

class GetMonthlyReports extends CommandDTO
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
        private readonly ?string $orderBy = null,
    ){}

    public function getUrlPath(): string
    {
        return '/statistics/months/';
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
            'order_by' => $this->orderBy,
        ];

        return array_filter($params);
    }

    /**
     * @param ResponseInterface $response
     * @return GetMonthlyReportsResponse
     */
    public function makeResponseDTO(ResponseInterface $response): ResponseDTO
    {
        return new GetMonthlyReportsResponse($response);
    }
}