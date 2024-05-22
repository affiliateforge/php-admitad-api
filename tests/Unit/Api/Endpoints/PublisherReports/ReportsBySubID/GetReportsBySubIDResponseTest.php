<?php

namespace Tests\Unit\Api\Endpoints\PublisherReports\ReportsBySubID;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportBySubID;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySubID\GetReportsBySubIDResponse;
use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetReportsBySubIDResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"_meta":{"count":1,"limit":1,"offset":0},"results":[{"clicks":2,"ecpc":0.0,"cr":0.0,"leads_sum":0,"sales_sum":0,"payment_sum_declined":0.0,"payment_sum_open":0.0,"payment_sum":0.0,"payment_sum_approved":0.0,"currency":"RUB","subid":"kvatra"}]}
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new GetReportsBySubIDResponse($response);

        $this->assertInstanceOf(ResponseMetaDTO::class, $dto->getMeta());
        $this->assertSame(1, $dto->getMeta()->getCount());
        $this->assertSame(1, $dto->getMeta()->getLimit());
        $this->assertSame(0, $dto->getMeta()->getOffset());

        $this->assertIsArray($dto->getResults());
        $this->assertCount(1, $dto->getResults());
        $report = $dto->getResults()[0];
        $this->assertInstanceOf(ReportBySubID::class, $report);

        $this->assertSame(2, $report->getClicks());
        $this->assertSame(0.0, $report->getEcpc());
        $this->assertSame(0.0, $report->getCr());
        $this->assertSame(0, $report->getLeadsSum());
        $this->assertSame(0, $report->getSalesSum());
        $this->assertSame(0.0, $report->getPaymentSumDeclined());
        $this->assertSame(0.0, $report->getPaymentSumOpen());
        $this->assertSame(0.0, $report->getPaymentSum());
        $this->assertSame(0.0, $report->getPaymentSumApproved());
        $this->assertSame('RUB', $report->getCurrency());
        $this->assertSame('kvatra', $report->getSubid());
   }
}