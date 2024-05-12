<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\AffiliateProgramCategory;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAffiliateProgramCategoriesResponse;
use Affiliateforge\PhpAdmitadApi\Api\ResponseMetaDTO;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetAffiliateProgramCategoriesResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"_meta":{"count":96,"limit":1,"offset":10},"results":[{"id":41,"name":"Hotels","language":"en","parent":{"id":40,"name":"Travel & Tourism","language":"en","parent":null}}]}
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new GetAffiliateProgramCategoriesResponse($response);

        $this->assertInstanceOf(ResponseMetaDTO::class, $dto->getMeta());
        $this->assertSame(96, $dto->getMeta()->getCount());
        $this->assertSame(1, $dto->getMeta()->getLimit());
        $this->assertSame(10, $dto->getMeta()->getOffset());

        $this->assertIsArray($dto->getResults());
        $this->assertCount(1, $dto->getResults());
        $this->assertInstanceOf(AffiliateProgramCategory::class, $dto->getResults()[0]);

        $this->assertSame(41, $dto->getResults()[0]->getId());
        $this->assertSame('Hotels', $dto->getResults()[0]->getName());
        $this->assertSame('en', $dto->getResults()[0]->getLanguage());

        $parent = $dto->getResults()[0]->getParent();
        $this->assertInstanceOf(AffiliateProgramCategory::class, $parent);
        $this->assertSame(40, $parent->getId());
        $this->assertSame('Travel & Tourism', $parent->getName());
        $this->assertSame('en', $parent->getLanguage());
        $this->assertNull($parent->getParent());
    }
}