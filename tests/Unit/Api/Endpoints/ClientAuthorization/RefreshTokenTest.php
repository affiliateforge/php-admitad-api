<?php

namespace Tests\Unit\Api\Endpoints\ClientAuthorization;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization\GetTokenResponse;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization\RefreshToken;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class RefreshTokenTest extends TestCase
{
    public function testEndpointConfiguration()
    {
        $clientID = 'abc4';
        $clientSecret = 'zyx8';
        $refreshToken = 'refresh-token-345';
        $dto = new RefreshToken($clientID, $clientSecret, $refreshToken);

        $this->assertSame('/token/', $dto->getUrlPath());
        $this->assertSame("POST", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'grant_type' => 'refresh_token',
            'client_id' => $clientID,
            'client_secret' => $clientSecret,
            'refresh_token' => $refreshToken,
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetTokenResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}