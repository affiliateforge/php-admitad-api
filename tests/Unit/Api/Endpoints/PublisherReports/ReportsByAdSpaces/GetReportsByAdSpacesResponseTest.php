<?php

namespace Tests\Unit\Api\Endpoints\PublisherReports\ReportsByAdSpaces;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportByAdSpace;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByAdSpaces\GetReportsByAdSpacesResponse;
use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetReportsByAdSpacesResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"_meta":{"count":6,"limit":1,"offset":0},"results":[{"website_id":"582754","website_name":"Domain parking","views":0,"clicks":5,"ctr":0.0,"ecpc":670.81,"ecpm":0.0,"cr":6.2,"leads_sum":0,"sales_sum":31,"payment_sum_open":0.0,"payment_sum_approved":3354.03,"payment_sum_declined":531.03,"currency":"RUB"}]}
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new GetReportsByAdSpacesResponse($response);

        $this->assertInstanceOf(ResponseMetaDTO::class, $dto->getMeta());
        $this->assertSame(6, $dto->getMeta()->getCount());
        $this->assertSame(1, $dto->getMeta()->getLimit());
        $this->assertSame(0, $dto->getMeta()->getOffset());

        $this->assertIsArray($dto->getResults());
        $this->assertCount(1, $dto->getResults());
        $report = $dto->getResults()[0];
        $this->assertInstanceOf(ReportByAdSpace::class, $report);

        $this->assertSame(582754, $report->getWebsiteId());
        $this->assertSame('Domain parking', $report->getWebsiteName());
        $this->assertSame(0, $report->getViews());
        $this->assertSame(5, $report->getClicks());
        $this->assertSame(0.0, $report->getCTR());
        $this->assertSame(670.81, $report->getECPC());
        $this->assertSame(0.0, $report->getECPM());
        $this->assertSame(6.2, $report->getCR());
        $this->assertSame(0, $report->getLeadsSum());
        $this->assertSame(31, $report->getSalesSum());
        $this->assertSame(0.0, $report->getPaymentSumOpen());
        $this->assertSame(3354.03, $report->getPaymentSumApproved());
        $this->assertSame(531.03, $report->getPaymentSumDeclined());
        $this->assertSame('RUB', $report->getCurrency());
    }
}