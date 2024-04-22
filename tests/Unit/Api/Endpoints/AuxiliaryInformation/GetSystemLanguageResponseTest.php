<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\SystemLanguage;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemLanguageResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetSystemLanguageResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"language":"Polski","language_code":"pl","flag":"https://cdn.admitad-connect.com/static/images/flags/pl-9292bf78.svg"}
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new GetSystemLanguageResponse($response);

        $this->assertInstanceOf(SystemLanguage::class, $dto->getLanguage());
    }
}