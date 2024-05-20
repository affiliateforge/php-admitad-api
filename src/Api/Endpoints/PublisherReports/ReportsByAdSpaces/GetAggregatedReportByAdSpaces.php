<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByAdSpaces;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\GetAggregatedReportCommand;

class GetAggregatedReportByAdSpaces extends GetReportsByAdSpaces
{
    use GetAggregatedReportCommand;
}