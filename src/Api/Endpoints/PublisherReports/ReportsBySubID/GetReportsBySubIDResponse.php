<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySubID;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportBySubID;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetReportsBySubIDResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<ReportBySubID>
     */
    public function getResults(): array
    {
        return array_map(
            fn(array $item) => new ReportBySubID($item),
            $this->getParsedBody()['results'],
        );
    }
}