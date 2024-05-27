<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByKeywords;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportByKeyword;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetReportsByKeywordsResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<ReportByKeyword>
     */
    public function getResults(): array
    {
        return array_map(
            fn(array $item) => new ReportByKeyword($item),
            $this->getParsedBody()['results'],
        );
    }
}