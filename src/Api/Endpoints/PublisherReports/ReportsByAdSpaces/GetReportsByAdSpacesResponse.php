<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByAdSpaces;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportByAdSpace;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetReportsByAdSpacesResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<ReportByAdSpace>
     */
    public function getResults(): array
    {
        return array_map(
            fn(array $item) => new ReportByAdSpace($item),
            $this->getParsedBody()['results'],
        );
    }
}