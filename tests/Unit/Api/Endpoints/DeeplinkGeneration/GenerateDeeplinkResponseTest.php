<?php

namespace Tests\Unit\Api\Endpoints\DeeplinkGeneration;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\DeeplinkGeneration\GenerateDeeplinkResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GenerateDeeplinkResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
["https://example.com/g/huwtg7ffw5201/?utm=4"]
JSON;

        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));

        $dto = new GenerateDeeplinkResponse($response);

        $this->assertSame(["https://example.com/g/huwtg7ffw5201/?utm=4"], $dto->getDeeplinks());
    }
}