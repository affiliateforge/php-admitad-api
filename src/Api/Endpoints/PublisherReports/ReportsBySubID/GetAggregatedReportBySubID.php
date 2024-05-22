<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySubID;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\GetAggregatedReportCommand;

class GetAggregatedReportBySubID extends GetReportsBySubID
{
    use GetAggregatedReportCommand;
}