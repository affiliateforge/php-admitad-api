<?php

namespace Tests\Unit\Api\Endpoints\PublisherReports\ReportsBySubID;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySubID\GetReportsBySubID;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySubID\GetReportsBySubIDResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetReportsBySubIDTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetReportsBySubID(
            offset: 4,
            limit: 9,
            dateStart: new \DateTime('2024-03-13 16:27:51'),
            dateEnd: new \DateTime('2024-03-30 12:03:32'),
            website: 1,
            campaign: 4,
            subid: ['est'],
            orderBy: 'voluptatem',
            groupSubids: 'corrupti',
        );

        $this->assertSame('/statistics/sub_ids/', $dto->getUrlPath());
        $this->assertSame('GET', $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'offset' => 4,
            'limit' => 9,
            'date_start' => '13.03.2024',
            'date_end' => '30.03.2024',
            'website' => 1,
            'campaign' => 4,
            'subid' => ['est'],
            'order_by' => 'voluptatem',
            'group_subids' => 'corrupti',
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetReportsBySubIDResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}