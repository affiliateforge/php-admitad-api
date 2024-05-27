<?php

namespace Tests\Unit\Api\Endpoints\PublisherReports\ReportsForAffiliatePrograms;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportForAffiliateProgram;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsForAffiliatePrograms\GetReportsForAffiliateProgramsResponse;
use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetReportsForAffiliateProgramsResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"_meta":{"count":9,"limit":1,"offset":0},"results":[{"advcampaign_id":333,"advcampaign_name":"AdvName1","views":0,"clicks":0,"ctr":0.0,"ecpc":0.0,"ecpm":0.0,"cr":0.0,"leads_sum":0,"sales_sum":31,"payment_sum_open":0.0,"payment_sum_approved":3354.03,"payment_sum_declined":531.03,"currency":"RUB"}]}
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new GetReportsForAffiliateProgramsResponse($response);

        $this->assertInstanceOf(ResponseMetaDTO::class, $dto->getMeta());
        $this->assertSame(9, $dto->getMeta()->getCount());
        $this->assertSame(1, $dto->getMeta()->getLimit());
        $this->assertSame(0, $dto->getMeta()->getOffset());

        $this->assertIsArray($dto->getResults());
        $this->assertCount(1, $dto->getResults());
        $report = $dto->getResults()[0];
        $this->assertInstanceOf(ReportForAffiliateProgram::class, $report);

        $this->assertSame(333, $report->getAdvCampaignId());
        $this->assertSame('AdvName1', $report->getAdvCampaignName());
        $this->assertSame(0, $report->getViews());
        $this->assertSame(0, $report->getClicks());
        $this->assertSame(0.0, $report->getCTR());
        $this->assertSame(0.0, $report->getECPC());
        $this->assertSame(0.0, $report->getECPM());
        $this->assertSame(0.0, $report->getCR());
        $this->assertSame(0, $report->getLeadsSum());
        $this->assertSame(31, $report->getSalesSum());
        $this->assertSame(0.0, $report->getPaymentSumOpen());
        $this->assertSame(3354.03, $report->getPaymentSumApproved());
        $this->assertSame(531.03, $report->getPaymentSumDeclined());
        $this->assertSame('RUB', $report->getCurrency());
    }
}