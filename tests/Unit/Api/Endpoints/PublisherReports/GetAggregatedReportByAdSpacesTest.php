<?php

namespace Tests\Unit\Api\Endpoints\PublisherReports;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\GetAggregatedReportByAdSpaces;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\GetAggregatedReportByAdSpacesResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetAggregatedReportByAdSpacesTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetAggregatedReportByAdSpaces(
            offset: 1,
            limit: 2,
            dateStart: new \DateTime('2024-04-10T00:00:00'),
            dateEnd: new \DateTime('2024-04-14T00:00:00'),
            website: 3,
            campaign: 777,
            subid: '14',
            orderBy: null,
        );

        $this->assertSame('/statistics/websites/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'offset' => 1,
            'limit' => 2,
            'date_start' => '10.04.2024',
            'date_end' => '14.04.2024',
            'website' => 3,
            'campaign' => 777,
            'subid' => '14',
            'total' => 1,
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetAggregatedReportByAdSpacesResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}