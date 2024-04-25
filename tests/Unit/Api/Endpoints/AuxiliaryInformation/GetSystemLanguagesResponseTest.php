<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\SystemLanguage;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemLanguagesResponse;
use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetSystemLanguagesResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"_meta":{"count":14,"limit":1,"offset":10},"results":[{"language":"Polski","language_code":"pl","flag":"https://cdn.admitad-connect.com/static/images/flags/pl-9292bf78.svg"}]}
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new GetSystemLanguagesResponse($response);

        $this->assertInstanceOf(ResponseMetaDTO::class, $dto->getMeta());
        $this->assertSame(14, $dto->getMeta()->getCount());
        $this->assertSame(1, $dto->getMeta()->getLimit());
        $this->assertSame(10, $dto->getMeta()->getOffset());

        $this->assertIsArray($dto->getResults());
        $this->assertCount(1, $dto->getResults());
        $this->assertInstanceOf(SystemLanguage::class, $dto->getResults()[0]);

        $this->assertSame('Polski', $dto->getResults()[0]->getLanguage());
        $this->assertSame('pl', $dto->getResults()[0]->getLanguageCode());
        $this->assertSame('https://cdn.admitad-connect.com/static/images/flags/pl-9292bf78.svg', $dto->getResults()[0]->getFlag());
    }
}