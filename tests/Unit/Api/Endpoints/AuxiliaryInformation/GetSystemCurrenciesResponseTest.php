<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\SystemCurrency;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemCurrenciesResponse;
use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetSystemCurrenciesResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"_meta":{"count":64,"limit":1,"offset":1},"results":[{"code":"AMD","name":"Armenian Dram","min_sum":"3000.00","sign":"AMD"}]}
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new GetSystemCurrenciesResponse($response);

        $this->assertInstanceOf(ResponseMetaDTO::class, $dto->getMeta());
        $this->assertSame(64, $dto->getMeta()->getCount());
        $this->assertSame(1, $dto->getMeta()->getLimit());
        $this->assertSame(1, $dto->getMeta()->getOffset());

        $this->assertIsArray($dto->getResults());
        $this->assertCount(1, $dto->getResults());
        $this->assertInstanceOf(SystemCurrency::class, $dto->getResults()[0]);

        $this->assertSame('AMD', $dto->getResults()[0]->getCode());
        $this->assertSame('Armenian Dram', $dto->getResults()[0]->getName());
        $this->assertSame(3000.0, $dto->getResults()[0]->getMinSum());
        $this->assertSame('AMD', $dto->getResults()[0]->getSign());
    }
}