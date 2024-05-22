<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByActions;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\GetAggregatedReportCommand;

class GetAggregatedReportByActions extends GetReportsByActions
{
    use GetAggregatedReportCommand;
}