<?php

namespace Tests\Unit\Api\Endpoints\PublisherReports\ReportsByActions;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportByAction;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByActions\GetReportsByActionsResponse;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByActions\Position;
use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetReportsByActionsResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"_meta":{"count":34,"limit":2,"offset":0},"results":[{"id":807084960,"order_id":"c-145792467","tariff_id":7106,"action_id":807084960,"advcampaign_id":14361,"advcampaign_name":"Adv name","website_name":"website","click_user_ip":null,"click_user_referer":"http:\/\/admitad.com\/","click_country_code":null,"conversion_time":0,"action":"buy 01.10.16","action_type":"sale","cart":209.32,"status":"approved","processed":1,"subid":"#admitad-click#","subid1":null,"subid2":null,"subid3":null,"subid4":null,"payment":104.66,"currency":"RUB","keyword":null,"comment":null,"positions":[{"id":915191242,"tariff_id":8343,"datetime":"2021-12-26 10:48:02","amount":"209.32","payment":"104.66","rate":"50.00","rate_id":74578,"percentage":true,"product_url":"","product_id":"","product_image":"","product_name":"","product_category_id":"","product_category_name":""}],"paid":0,"promocode":null,"click_date":"2021-12-26 10:48:02","action_date":"2021-12-26 10:48:02","closing_date":"2022-02-03","status_updated":"2022-02-02 05:24:24"}]}
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new GetReportsByActionsResponse($response);

        $this->assertInstanceOf(ResponseMetaDTO::class, $dto->getMeta());
        $this->assertSame(34, $dto->getMeta()->getCount());
        $this->assertSame(2, $dto->getMeta()->getLimit());
        $this->assertSame(0, $dto->getMeta()->getOffset());

        $this->assertIsArray($dto->getResults());
        $this->assertCount(1, $dto->getResults());
        $report = $dto->getResults()[0];
        $this->assertInstanceOf(ReportByAction::class, $report);

        $this->assertSame(807084960, $report->getId());
        $this->assertSame('c-145792467', $report->getOrderId());
        $this->assertSame(7106, $report->getTariffId());
        $this->assertSame(807084960, $report->getActionId());
        $this->assertSame(14361, $report->getAdvcampaignId());
        $this->assertSame('Adv name', $report->getAdvcampaignName());
        $this->assertSame('website', $report->getWebsiteName());
        $this->assertNull($report->getClickUserIp());
        $this->assertSame('http://admitad.com/', $report->getClickUserReferer());
        $this->assertNull($report->getClickCountryCode());
        $this->assertSame(0, $report->getConversionTime());
        $this->assertSame('buy 01.10.16', $report->getAction());
        $this->assertSame('sale', $report->getActionType());
        $this->assertSame(209.32, $report->getCart());
        $this->assertSame('approved', $report->getStatus());
        $this->assertSame(1, $report->getProcessed());
        $this->assertSame('#admitad-click#', $report->getSubid());
        $this->assertNull($report->getSubid1());
        $this->assertNull($report->getSubid2());
        $this->assertNull($report->getSubid3());
        $this->assertNull($report->getSubid4());
        $this->assertSame(104.66, $report->getPayment());
        $this->assertSame('RUB', $report->getCurrency());
        $this->assertNull($report->getKeyword());
        $this->assertNull($report->getComment());
        $this->assertSame(0, $report->getPaid());
        $this->assertNull($report->getPromocode());
        $this->assertSame('2021-12-26 10:48:02', $report->getClickDate());
        $this->assertSame('2021-12-26 10:48:02', $report->getActionDate());
        $this->assertSame('2022-02-03', $report->getClosingDate());
        $this->assertSame('2022-02-02 05:24:24', $report->getStatusUpdated());

        $this->assertIsArray($report->getPositions());
        $this->assertCount(1, $report->getPositions());
        $position = $report->getPositions()[0];
        $this->assertInstanceOf(Position::class, $position);

        $this->assertSame(915191242, $position->getId());
        $this->assertSame(8343, $position->getTariffId());
        $this->assertEquals(new \DateTime('2021-12-26 10:48:02'), $position->getDatetime());
        $this->assertSame(209.32, $position->getAmount());
        $this->assertSame(104.66, $position->getPayment());
        $this->assertSame(50.00, $position->getRate());
        $this->assertSame(74578, $position->getRateId());
        $this->assertSame(true, $position->getPercentage());
        $this->assertSame('', $position->getProductUrl());
        $this->assertSame('', $position->getProductId());
        $this->assertSame('', $position->getProductImage());
        $this->assertSame('', $position->getProductName());
        $this->assertSame('', $position->getProductCategoryId());
        $this->assertSame('', $position->getProductCategoryName());
   }
}