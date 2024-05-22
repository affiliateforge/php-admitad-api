<?php

namespace Tests\Unit\Api\Endpoints\PublisherReports\ReportsByActions;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportByAction;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByActions\GetReportsByActionsResponse;
use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetReportsByActionsResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"_meta":{"count":34,"limit":2,"offset":0},"results":[{"id":807084960,"order_id":"c-145792467","tariff_id":7106,"action_id":807084960,"advcampaign_id":14361,"advcampaign_name":"Letyshops [lifetime]","website_name":"\u041f\u0430\u0440\u043a\u043e\u0432\u043a\u0430 \u0434\u043e\u043c\u0435\u043d\u043e\u0432","click_user_ip":null,"click_user_referer":"http:\/\/admitad.com\/","click_country_code":null,"conversion_time":0,"action":"\u041e\u043f\u043b\u0430\u0447\u0435\u043d\u043d\u044b\u0439 \u0437\u0430\u043a\u0430\u0437 - \u041a\u043b\u0438\u0435\u043d\u0442 \u0437\u0430\u0440\u0435\u0433. \u0441 01.10.16","action_type":"sale","cart":209.32,"status":"approved","processed":1,"subid":"#admitad-click#","subid1":null,"subid2":null,"subid3":null,"subid4":null,"payment":104.66,"currency":"RUB","keyword":null,"comment":null,"positions":[{"id":915191242,"tariff_id":8343,"datetime":"2021-12-26 10:48:02","amount":"209.32","payment":"104.66","rate":"50.00","rate_id":74578,"percentage":true,"product_url":"","product_id":"","product_image":"","product_name":"","product_category_id":"","product_category_name":""}],"paid":0,"promocode":null,"click_date":"2021-12-26 10:48:02","action_date":"2021-12-26 10:48:02","closing_date":"2022-02-03","status_updated":"2022-02-02 05:24:24"},{"id":802892236,"order_id":"c-144513965","tariff_id":7106,"action_id":802892236,"advcampaign_id":14361,"advcampaign_name":"Letyshops [lifetime]","website_name":"\u041f\u0430\u0440\u043a\u043e\u0432\u043a\u0430 \u0434\u043e\u043c\u0435\u043d\u043e\u0432","click_user_ip":null,"click_user_referer":"http:\/\/admitad.com\/","click_country_code":null,"conversion_time":0,"action":"\u041e\u043f\u043b\u0430\u0447\u0435\u043d\u043d\u044b\u0439 \u0437\u0430\u043a\u0430\u0437 - \u041a\u043b\u0438\u0435\u043d\u0442 \u0437\u0430\u0440\u0435\u0433. \u0441 01.10.16","action_type":"sale","cart":null,"status":"approved","processed":1,"subid":"#admitad-click#","subid1":null,"subid2":null,"subid3":null,"subid4":null,"payment":0,"currency":"RUB","keyword":null,"comment":"\u0411\u044b\u043b \u043f\u0440\u0438\u043c\u0435\u043d\u0435\u043d \u0434\u0432\u043e\u0439\u043d\u043e\u0439 \u043a\u0435\u0448\u0431\u0435\u043a","positions":[{"id":910583645,"tariff_id":8343,"datetime":"2021-12-16 21:20:04","amount":"0.00","payment":"0.00","rate":"50.00","rate_id":74578,"percentage":true,"product_url":"","product_id":"","product_image":"","product_name":"","product_category_id":"","product_category_name":""}],"paid":1,"promocode":null,"click_date":"2021-12-16 21:20:04","action_date":"2021-12-16 21:20:04","closing_date":"2022-01-01","status_updated":"2021-12-31 05:14:53"}]}
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
        $this->assertSame('Letyshops [lifetime]', $report->getAdvcampaignName());
        $this->assertSame('Парковка доменов', $report->getWebsiteName());
        $this->assertNull($report->getClickUserIp());
        $this->assertSame('http://admitad.com/', $report->getClickUserReferer());
        $this->assertNull($report->getClickCountryCode());
        $this->assertSame(0, $report->getConversionTime());
        $this->assertSame('Оплаченный заказ - Клиент зарег. с 01.10.16', $report->getAction());
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
   }
}