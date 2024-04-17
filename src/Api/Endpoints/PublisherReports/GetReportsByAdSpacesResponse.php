<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports;

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
        return [

        ];
    }
}