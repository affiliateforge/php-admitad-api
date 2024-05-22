<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByActions;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Psr\Http\Message\ResponseInterface;

class GetReportsByActions extends CommandDTO
{
    use GET;

    public function __construct(
        private readonly ?int $offset = null,
        private readonly ?int $limit = null,
        private readonly ?int $actionIdStart = null,
        private readonly ?\DateTime $dateStart = null,
        private readonly ?\DateTime $dateEnd = null,
        private readonly ?\DateTime $closingDateStart = null,
        private readonly ?\DateTime $closingDateEnd = null,
        private readonly ?\DateTime $statusUpdatedStart = null,
        private readonly ?\DateTime $statusUpdatedEnd = null,
        private readonly ?int $website = null,
        private readonly ?int $campaign = null,
        private readonly ?string $subid = null,
        private readonly ?string $subid1 = null,
        private readonly ?string $subid2 = null,
        private readonly ?string $subid3 = null,
        private readonly ?string $subid4 = null,
        private readonly ?string $source = null,
        private readonly ?string $status = null,
        private readonly ?string $keyword = null,
        private readonly ?string $action = null,
        private readonly ?int $actionId = null,
        private readonly ?string $banner = null,
        private readonly ?string $actionType = null,
        private readonly ?int $processed = null,
        private readonly ?int $paid = null,
        private readonly ?string $orderBy = null,
    ){}

    public function getUrlPath(): string
    {
        return '/statistics/actions/';
    }

    public function getQueryParams(): array
    {
        $params = [
            'offset' => $this->offset,
            'limit' => $this->limit,
            'action_id_start' => $this->actionIdStart,
            'date_start' => $this->dateStart?->format('d.m.Y'),
            'date_end' => $this->dateEnd?->format('d.m.Y'),
            'closing_date_start' => $this->closingDateStart?->format('d.m.Y'),
            'closing_date_end' => $this->closingDateEnd?->format('d.m.Y'),
            'status_updated_start' => $this->statusUpdatedStart?->format('d.m.Y'),
            'status_updated_end' => $this->statusUpdatedEnd?->format('d.m.Y'),
            'website' => $this->website,
            'campaign' => $this->campaign,
            'subid' => $this->subid,
            'subid1' => $this->subid1,
            'subid2' => $this->subid2,
            'subid3' => $this->subid3,
            'subid4' => $this->subid4,
            'source' => $this->source,
            'status' => $this->status,
            'keyword' => $this->keyword,
            'action' => $this->action,
            'action_id' => $this->actionId,
            'banner' => $this->banner,
            'action_type' => $this->actionType,
            'processed' => $this->processed,
            'paid' => $this->paid,
            'order_by' => $this->orderBy,
        ];

        return array_filter($params, fn($param) => !is_null($param));
    }

    public function makeResponseDTO(ResponseInterface $response): GetReportsByActionsResponse
    {
        return new GetReportsByActionsResponse($response);
    }
}