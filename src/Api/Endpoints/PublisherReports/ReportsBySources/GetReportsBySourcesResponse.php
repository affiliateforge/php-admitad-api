<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySources;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportBySource;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetReportsBySourcesResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<ReportBySource>
     */
    public function getResults(): array
    {
        return array_map(
            fn(array $item) => new ReportBySource($item),
            $this->getParsedBody()['results'],
        );
    }
}