<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports;

use Psr\Http\Message\ResponseInterface;

trait GetAggregatedReportCommand
{
    public function getQueryParams(): array
    {
        return [...parent::getQueryParams(), 'total' => 1];
    }

    public function makeResponseDTO(ResponseInterface $response): AggregatedReportResponse
    {
        return new AggregatedReportResponse($response);
    }
}