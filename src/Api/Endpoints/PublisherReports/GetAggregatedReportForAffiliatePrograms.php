<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports;

use Psr\Http\Message\ResponseInterface;

class GetAggregatedReportForAffiliatePrograms extends GetReportsForAffiliatePrograms
{
    public function getQueryParams(): array
    {
        return [...parent::getQueryParams(), 'total' => 1];
    }

    public function makeResponseDTO(ResponseInterface $response): GetAggregatedReportForAffiliateProgramsResponse
    {
        return new GetAggregatedReportForAffiliateProgramsResponse($response);
    }
}