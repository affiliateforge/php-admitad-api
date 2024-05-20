<?php

namespace Tests\Unit\Api\Endpoints\PublisherReports\MonthlyReports;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\MonthlyReport;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\MonthlyReports\GetMonthlyReportsResponse;
use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetMonthlyReportsResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"_meta":{"count":2,"limit":1,"offset":0},"results":[{"date":"2021-01","views":0,"clicks":1367,"ctr":0.0,"ecpc":0.0,"ecpm":0.0,"cr":0.0,"leads_sum":0,"leads_sum_open":0,"leads_sum_approved":0,"leads_sum_declined":0,"sales_sum":0,"sales_sum_open":0,"sales_sum_approved":0,"sales_sum_declined":0,"payment_sum_open":0.0,"payment_sum_approved":0.0,"payment_sum_declined":0.0,"currency":"RUB"}]}
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new GetMonthlyReportsResponse($response);

        $this->assertInstanceOf(ResponseMetaDTO::class, $dto->getMeta());
        $this->assertSame(2, $dto->getMeta()->getCount());
        $this->assertSame(1, $dto->getMeta()->getLimit());
        $this->assertSame(0, $dto->getMeta()->getOffset());

        $this->assertIsArray($dto->getResults());
        $this->assertCount(1, $dto->getResults());
        $report = $dto->getResults()[0];
        $this->assertInstanceOf(MonthlyReport::class, $report);

        $this->assertSame('2021-01', $report->getDate());
        $this->assertSame(0, $report->getViews());
        $this->assertSame(1367, $report->getClicks());
        $this->assertSame(0.0, $report->getCTR());
        $this->assertSame(0.0, $report->getECPC());
        $this->assertSame(0.0, $report->getECPM());
        $this->assertSame(0.0, $report->getCR());
        $this->assertSame(0, $report->getLeadsSum());
        $this->assertSame(0, $report->getLeadsSumOpen());
        $this->assertSame(0, $report->getLeadsSumApproved());
        $this->assertSame(0, $report->getLeadsSumDeclined());
        $this->assertSame(0, $report->getSalesSum());
        $this->assertSame(0, $report->getSalesSumOpen());
        $this->assertSame(0, $report->getSalesSumApproved());
        $this->assertSame(0, $report->getSalesSumDeclined());
        $this->assertSame(0.0, $report->getPaymentSumOpen());
        $this->assertSame(0.0, $report->getPaymentSumApproved());
        $this->assertSame(0.0, $report->getPaymentSumDeclined());
        $this->assertSame('RUB', $report->getCurrency());
    }
}