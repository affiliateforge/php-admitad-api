<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAffiliateProgramCategory;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAffiliateProgramCategoryResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetAffiliateProgramCategoryTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $dto = new GetAffiliateProgramCategory(
            10, 'en'
        );

        $this->assertSame('/categories/10/', $dto->getUrlPath());
        $this->assertSame("GET", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame(['language' => 'en'], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetAffiliateProgramCategoryResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}