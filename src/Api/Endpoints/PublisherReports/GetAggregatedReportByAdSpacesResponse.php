<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\AggregatedReportByAdSpace;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;

class GetAggregatedReportByAdSpacesResponse extends ResponseDTO
{
    public function getReport(): AggregatedReportByAdSpace
    {
        return new AggregatedReportByAdSpace($this->getParsedBody()[0]);
    }
}