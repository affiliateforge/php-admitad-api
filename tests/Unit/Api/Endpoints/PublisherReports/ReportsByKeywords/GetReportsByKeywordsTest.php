<?php

namespace Tests\Unit\Api\Endpoints\PublisherReports\ReportsByKeywords;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByKeywords\GetReportsByKeywords;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByKeywords\GetReportsByKeywordsResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetReportsByKeywordsTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetReportsByKeywords(
            offset: 82,
            limit: 16,
            dateStart: new \DateTime('2024-04-02 01:16:53'),
            dateEnd: new \DateTime('2024-03-27 08:11:02'),
            website: 1,
            campaign: 45,
            source: 'voluptas',
            orderBy: 'clicks',
        );

        $this->assertSame('/statistics/keywords/', $dto->getUrlPath());
        $this->assertSame('GET', $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'offset' => 82,
            'limit' => 16,
            'date_start' => '02.04.2024',
            'date_end' => '27.03.2024',
            'website' => 1,
            'campaign' => 45,
            'source' => 'voluptas',
            'order_by' => 'clicks',
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetReportsByKeywordsResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}