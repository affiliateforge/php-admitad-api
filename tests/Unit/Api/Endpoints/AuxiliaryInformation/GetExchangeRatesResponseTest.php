<?php

namespace Tests\Unit\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\ExchangeRate;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetExchangeRatesResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetExchangeRatesResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseJson = <<<JSON
{"date":"2024-04-16","base":"RUB","target":"USD","rate":"0.0106850050"}
JSON;
        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseJson));
        $dto = new GetExchangeRatesResponse($response);

        $this->assertInstanceOf(ExchangeRate::class, $dto->getExchangeRate());
        $this->assertEquals(
            (new \DateTime())
                ->setTimezone(new \DateTimeZone('UTC'))
                ->setDate(2024, 4, 16)
                ->setTime(0, 0),
            $dto->getExchangeRate()->getDate()
        );
        $this->assertSame('RUB', $dto->getExchangeRate()->getFromCurrencyCode());
        $this->assertSame('USD', $dto->getExchangeRate()->getToCurrencyCode());
        $this->assertSame(0.010685005, $dto->getExchangeRate()->getRate());
    }
}