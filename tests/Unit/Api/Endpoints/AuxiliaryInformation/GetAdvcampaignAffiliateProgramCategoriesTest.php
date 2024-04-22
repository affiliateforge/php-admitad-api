<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAdvcampaignAffiliateProgramCategories;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAffiliateProgramCategoriesResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetAdvcampaignAffiliateProgramCategoriesTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetAdvcampaignAffiliateProgramCategories(
            777,
            offset: 4,
            limit: 1,
            language: 'en',
            orderBy: 'name',
        );

        $this->assertSame('/categories/advcampaign/777/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'offset' => 4,
            'limit' => 1,
            'language' => 'en',
            'order_by' => 'name',
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetAffiliateProgramCategoriesResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}