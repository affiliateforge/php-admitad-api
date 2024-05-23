<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByKeywords;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\GetAggregatedReportCommand;

class GetAggregatedReportByKeywords extends GetReportsByKeywords
{
    use GetAggregatedReportCommand;
}