<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\TrafficSource;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetTrafficSourcesResponse;
use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetTrafficSourcesResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"_meta":{"count":29,"limit":1,"offset":1},"results":[{"id":2,"name":"PopUp / ClickUnder"}]}
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new GetTrafficSourcesResponse($response);

        $this->assertInstanceOf(ResponseMetaDTO::class, $dto->getMeta());
        $this->assertSame(29, $dto->getMeta()->getCount());
        $this->assertSame(1, $dto->getMeta()->getLimit());
        $this->assertSame(1, $dto->getMeta()->getOffset());

        $this->assertIsArray($dto->getResults());
        $this->assertCount(1, $dto->getResults());
        $this->assertInstanceOf(TrafficSource::class, $dto->getResults()[0]);

        $this->assertSame(2, $dto->getResults()[0]->getId());
        $this->assertSame('PopUp / ClickUnder', $dto->getResults()[0]->getName());
    }
}