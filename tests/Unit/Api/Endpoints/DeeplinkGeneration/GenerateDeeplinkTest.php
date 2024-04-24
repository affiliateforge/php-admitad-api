<?php

namespace Tests\Unit\Api\Endpoints\DeeplinkGeneration;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\DeeplinkGeneration\GenerateDeeplink;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\DeeplinkGeneration\GenerateDeeplinkResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GenerateDeeplinkTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GenerateDeeplink(
            websiteId: 3,
            advCampaignId: 777,
            ulp: 'https://example.com/route',
            subid: 'subid',
            subid1: 'subid1',
            subid2: 'subid2',
            subid3: 'subid3',
            subid4: 'subid4',
        );

        $this->assertSame('/deeplink/3/advcampaign/777/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'subid' => 'subid',
            'subid1' => 'subid1',
            'subid2' => 'subid2',
            'subid3' => 'subid3',
            'subid4' => 'subid4',
            'ulp' => 'https://example.com/route',
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GenerateDeeplinkResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}