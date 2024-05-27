<?php

namespace Tests\Unit\Api\Endpoints\PublisherReports\ReportsByAdSpaces;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByAdSpaces\GetReportsByAdSpaces;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByAdSpaces\GetReportsByAdSpacesResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetReportsByAdSpacesTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetReportsByAdSpaces(
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
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetReportsByAdSpacesResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}