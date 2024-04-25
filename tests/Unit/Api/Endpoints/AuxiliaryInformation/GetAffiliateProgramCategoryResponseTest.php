<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\AffiliateProgramCategory;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAffiliateProgramCategoryResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetAffiliateProgramCategoryResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"id":10,"name":"Кредитные карты","language":"ru","parent":{"id":7,"name":"Финансовые программы","language":"ru","parent":null}}
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new GetAffiliateProgramCategoryResponse($response);

        $this->assertInstanceOf(AffiliateProgramCategory::class, $dto->getCategory());
    }
}