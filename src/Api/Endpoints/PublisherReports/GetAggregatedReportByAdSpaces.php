<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports;

use Psr\Http\Message\ResponseInterface;

class GetAggregatedReportByAdSpaces extends GetReportsByAdSpaces
{
    public function getQueryParams(): array
    {
        return [...parent::getQueryParams(), 'total' => 1];
    }

    public function makeResponseDTO(ResponseInterface $response): GetAggregatedReportByAdSpacesResponse
    {
        return new GetAggregatedReportByAdSpacesResponse($response);
    }
}