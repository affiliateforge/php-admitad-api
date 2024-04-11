<?php

namespace Tests\Unit\Api\Endpoints\ClientAuthorization;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization\GetTokenResponse;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class GetTokenResponseTest extends TestCase
{
    public function testGetters()
    {
        $responseContent = <<<JSON
{"access_token": "br9hdy1YDfzMdKAUtONA8oQszObAFS", "expires_in": 604800, "token_type": "bearer", "scope": "public_data websites", "refresh_token": "Cz6YdTdcBBBUnNgucuklAEVx05TcT0", "username": "user123", "first_name": "John", "last_name": "Smith", "language": "ru", "id": 1111111, "group": "webmaster", "code": "sel7vo19mqv"}
JSON;

        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream($responseContent));
        $dto = new GetTokenResponse($response);

        $this->assertSame('br9hdy1YDfzMdKAUtONA8oQszObAFS', $dto->getAccessToken());
        $this->assertSame('Cz6YdTdcBBBUnNgucuklAEVx05TcT0', $dto->getRefreshToken());
        $this->assertSame(1111111, $dto->getId());
        $this->assertSame('user123', $dto->getUserName());
        $this->assertSame('John', $dto->getFirstName());
        $this->assertSame('Smith', $dto->getLastName());
        $this->assertSame(604800, $dto->getExpiresIn());
        $this->assertSame('bearer', $dto->getTokenType());
        $this->assertSame(['public_data', 'websites'], $dto->getScopes());
        $this->assertSame('ru', $dto->getLanguage());
        $this->assertSame('webmaster', $dto->getGroup());
        $this->assertSame('sel7vo19mqv', $dto->getCode());
    }
}