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
            offset: 5,
            limit: 8,
            actionIdStart: 0,
            dateStart: new \DateTime('2024-03-11 17:47:21'),
            dateEnd: new \DateTime('2024-04-15 08:53:24'),
            closingDateStart: new \DateTime('2024-04-17 06:05:04'),
            closingDateEnd: new \DateTime('2024-04-02 07:15:03'),
            statusUpdatedStart: new \DateTime('2024-04-30 01:20:29'),
            statusUpdatedEnd: new \DateTime('2024-05-01 06:08:46'),
            website: 2,
            campaign: 5,
            subid: 'culpa',
            subid1: 'placeat',
            subid2: 'eligendi',
            subid3: 'eum',
            subid4: 'aut',
            source: 'molestias',
            status: 'ipsum',
            keyword: 'quasi',
            action: 'quia',
            actionId: 7,
            banner: 'corporis',
            actionType: 'aut',
            processed: 0,
            paid: 5,
            orderBy: 'optio',
        );

        $this->assertSame('/statistics/actions/', $dto->getUrlPath());
        $this->assertSame('GET', $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'offset' => 5,
            'limit' => 8,
            'actionIdStart' => 0,
            'dateStart' => new \DateTime('2024-03-11 17:47:21'),
            'dateEnd' => new \DateTime('2024-04-15 08:53:24'),
            'closingDateStart' => new \DateTime('2024-04-17 06:05:04'),
            'closingDateEnd' => new \DateTime('2024-04-02 07:15:03'),
            'statusUpdatedStart' => new \DateTime('2024-04-30 01:20:29'),
            'statusUpdatedEnd' => new \DateTime('2024-05-01 06:08:46'),
            'website' => 2,
            'campaign' => 5,
            'subid' => 'culpa',
            'subid1' => 'placeat',
            'subid2' => 'eligendi',
            'subid3' => 'eum',
            'subid4' => 'aut',
            'source' => 'molestias',
            'status' => 'ipsum',
            'keyword' => 'quasi',
            'action' => 'quia',
            'actionId' => 7,
            'banner' => 'corporis',
            'actionType' => 'aut',
            'processed' => 0,
            'paid' => 5,
            'orderBy' => 'optio',
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetReportsByActionsResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}