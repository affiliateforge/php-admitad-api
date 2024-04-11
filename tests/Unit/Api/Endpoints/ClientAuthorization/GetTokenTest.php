<?php

namespace Tests\Unit\Api\Endpoints\ClientAuthorization;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization\GetToken;
use Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization\GetTokenResponse;
use Http\Discovery\Psr17FactoryDiscovery;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Response\JsonMockResponse;

class GetTokenTest extends TestCase
{

    public function testEndpointConfiguration()
    {
        $clientID = 'abc4';
        $scopes = ['public_data', 'websites'];
        $dto = new GetToken($clientID, $scopes);

        $this->assertSame('/token/', $dto->getUrlPath());
        $this->assertSame("POST", $dto->getHttpMethod());
        $this->assertEmpty($dto->getBody());
        $this->assertSame([
            'grant_type' => 'client_credentials',
            'client_id' => $clientID,
            'scope' => 'public_data websites',
        ], $dto->getQueryParams());

        $mockResponse = (new Psr17Factory())->createResponse();
        $this->assertInstanceOf(GetTokenResponse::class, $dto->makeResponseDTO($mockResponse));
    }
}
