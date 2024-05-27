<?php

namespace Tests\Unit\Api\Endpoints\PublisherReports;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\AggregatedReportResponse;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\AggregatedReport;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class AggregatedReportResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
[{"views":0,"clicks":24454,"leads_sum":0,"sales_sum":34,"actions_sum_total":34,"payment_sum_open":0.0,"payment_sum_approved":3354.03,"payment_sum_declined":4780.33,"payment_sum":3354.03,"currency":"RUB","cr":0.14,"ecpc":0.14}]
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new AggregatedReportResponse($response);

        $report = $dto->getReport();
        $this->assertInstanceOf(AggregatedReport::class, $report);

        $this->assertSame(0, $report->getViews());
        $this->assertSame(24454, $report->getClicks());
        $this->assertSame(0, $report->getLeadsSum());
        $this->assertSame(34, $report->getSalesSum());
        $this->assertSame(34, $report->getActionsSumTotal());
        $this->assertSame(0.0, $report->getPaymentSumOpen());
        $this->assertSame(3354.03, $report->getPaymentSumApproved());
        $this->assertSame(4780.33, $report->getPaymentSumDeclined());
        $this->assertSame(3354.03, $report->getPaymentSum());
        $this->assertSame('RUB', $report->getCurrency());
        $this->assertSame(0.14, $report->getCR());
        $this->assertSame(0.14, $report->getECPC());
    }
}