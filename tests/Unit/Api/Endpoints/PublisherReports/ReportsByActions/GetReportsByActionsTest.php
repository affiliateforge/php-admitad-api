<?php

namespace Tests\Unit\Api\Endpoints\PublisherReports\ReportsByActions;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByActions\GetReportsByActions;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByActions\GetReportsByActionsResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetReportsByActionsTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetReportsByActions(
            offset: 3,
            limit: 6,
            actionIdStart: 7,
            dateStart: new \DateTime('2024-05-01 06:25:59'),
            dateEnd: new \DateTime('2024-03-06 12:27:23'),
            closingDateStart: new \DateTime('2024-03-17 03:09:27'),
            closingDateEnd: new \DateTime('2024-05-13 16:08:29'),
            statusUpdatedStart: new \DateTime('2024-05-17 21:06:04'),
            statusUpdatedEnd: new \DateTime('2024-04-15 09:57:33'),
            website: 2,
            campaign: 0,
            subid: 'ut',
            subid1: 'amet',
            subid2: 'et',
            subid3: 'assumenda',
            subid4: 'nesciunt',
            source: 'eveniet',
            status: 'at',
            keyword: 'et',
            action: 'corrupti',
            actionId: 8,
            banner: 'praesentium',
            actionType: 'provident',
            processed: 0,
            paid: 7,
            orderBy: 'fugiat',
        );

        $this->assertSame('/statistics/actions/', $dto->getUrlPath());
        $this->assertSame('GET', $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'offset' => 3,
            'limit' => 6,
            'action_id_start' => 7,
            'date_start' => '01.05.2024',
            'date_end' => '06.03.2024',
            'closing_date_start' => '17.03.2024',
            'closing_date_end' => '13.05.2024',
            'status_updated_start' => '17.05.2024',
            'status_updated_end' => '15.04.2024',
            'website' => 2,
            'campaign' => 0,
            'subid' => 'ut',
            'subid1' => 'amet',
            'subid2' => 'et',
            'subid3' => 'assumenda',
            'subid4' => 'nesciunt',
            'source' => 'eveniet',
            'status' => 'at',
            'keyword' => 'et',
            'action' => 'corrupti',
            'action_id' => 8,
            'banner' => 'praesentium',
            'action_type' => 'provident',
            'processed' => 0,
            'paid' => 7,
            'order_by' => 'fugiat',
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetReportsByActionsResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}