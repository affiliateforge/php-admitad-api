<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByActions;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportByAction;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetReportsByActionsResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<ReportByAction>
     */
    public function getResults(): array
    {
        return array_map(
            fn(array $item) => new ReportByAction($item),
            $this->getParsedBody()['results'],
        );
    }
}