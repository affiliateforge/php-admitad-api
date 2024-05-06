<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\AggregatedReport;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;

class GetAggregatedReportForAffiliateProgramsResponse extends ResponseDTO
{
    public function getReport(): AggregatedReport
    {
        return new AggregatedReport($this->getParsedBody()[0]);
    }
}