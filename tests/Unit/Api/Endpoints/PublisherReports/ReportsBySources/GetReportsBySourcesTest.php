<?php

namespace Tests\Unit\Api\Endpoints\PublisherReports\ReportsBySources;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySources\GetReportsBySources;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySources\GetReportsBySourcesResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetReportsBySourcesTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetReportsBySources(
            offset: 8,
            limit: 20,
            dateStart: new \DateTime('2024-05-13 12:36:14'),
            dateEnd: new \DateTime('2024-03-16 16:10:34'),
            website: 48,
            campaign: 74,
            orderBy: 'actions',
        );

        $this->assertSame('/statistics/sources/', $dto->getUrlPath());
        $this->assertSame('GET', $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'offset' => 8,
            'limit' => 20,
            'date_start' => '13.05.2024',
            'date_end' => '16.03.2024',
            'website' => 48,
            'campaign' => 74,
            'order_by' => 'actions',
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetReportsBySourcesResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}