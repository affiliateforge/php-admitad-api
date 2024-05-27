<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySubID;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Psr\Http\Message\ResponseInterface;

class GetReportsBySubID extends CommandDTO
{
    use GET;

    public function __construct(
        private readonly ?int $offset = null,
        private readonly ?int $limit = null,
        private readonly ?\DateTime $dateStart = null,
        private readonly ?\DateTime $dateEnd = null,
        private readonly ?int $website = null,
        private readonly ?int $campaign = null,
        private readonly array $subid = [],
        private readonly ?string $orderBy = null,
        private readonly ?string $groupSubids = null,
    ){}

    public function getUrlPath(): string
    {
        return '/statistics/sub_ids/';
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
            'group_subids' => $this->groupSubids,
        ];

        return array_filter($params);
    }

    public function makeResponseDTO(ResponseInterface $response): ResponseDTO
    {
        return new GetReportsBySubIDResponse($response);
    }
}