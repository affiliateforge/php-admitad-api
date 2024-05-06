<?php

namespace Tests\Unit;

use Affiliateforge\PhpAdmitadApi\APIClient;
use Http\Discovery\Psr18ClientDiscovery;
use Http\Discovery\Strategy\MockClientStrategy;
use Http\Mock\Client as MockClient;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class ApiClientTest extends TestCase
{
    public function testDoRequestOK()
    {
        $mockHttpClient = new MockClient();
        $apiClient = new ApiClient($mockHttpClient);

        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream(json_encode(['key' => 'value'])));
        $mockHttpClient->addResponse($response);

        $headers = ['Header-1' => 'H1', 'Header-2' => ['F', 'Z']];
        $command = new TestCommand();

        $apiClientResponse = $apiClient->doRequest($command, $headers);
        $this->assertFalse($apiClientResponse->isError());
        $this->assertNull($apiClientResponse->getErrorDTO());
        $this->assertInstanceOf(TestResponse::class, $apiClientResponse);

        $lastRequest = $mockHttpClient->getLastRequest();
        $this->assertSame(
            'https://api.admitad.com/test-url?param1=value1&param2[0]=x&param2[1]=y',
            urldecode($lastRequest->getUri()->__toString())
        );
        $this->assertSame('POST', $lastRequest->getMethod());
        $this->assertEquals([
            'Host' => ['api.admitad.com'],
            'Header-1' => ['H1'],
            'Header-2' => ['F', 'Z'],
            'Content-Type' => ['application/x-www-form-urlencoded'],
        ], $lastRequest->getHeaders());
        $this->assertSame('{"body_1":"body-value1","body_array":["a","b","c"]}', $lastRequest->getBody()->__toString());
    }

    public function testDoRequestInvalidParams()
    {
        $mockHttpClient = new MockClient();
        $apiClient = new ApiClient($mockHttpClient);

        $factory = new Psr17Factory();
        $invalidCleintResponse = <<<JSON
{"error": "invalid_client", "error_description": "client_id asdas123 doesn't exist"}
JSON;
        $response = $factory->createResponse(401, 'Unauthorized')
            ->withBody($factory->createStream($invalidCleintResponse));
        $mockHttpClient->addResponse($response);
        $command = new TestCommand();
        $responseDTO = $apiClient->doRequest($command);

        $this->assertInstanceOf(TestResponse::class, $responseDTO);
        $this->assertTrue($responseDTO->isError());

        $errorDTO = $responseDTO->getErrorDTO();
        $this->assertSame('invalid_client', $errorDTO->getErrorCode());
        $this->assertSame("client_id asdas123 doesn't exist", $errorDTO->getErrorDescription());
        $this->assertSame(401, $errorDTO->getHttpCode());
        $this->assertSame('Unauthorized', $errorDTO->getHttpCodePhrase());
    }

    public function testDoRequestMethodNotAllowed()
    {
        $mockHttpClient = new MockClient();
        $apiClient = new ApiClient($mockHttpClient);

        $factory = new Psr17Factory();
        $response = $factory->createResponse(405, 'Method Not Allowed')
            ->withBody($factory->createStream(''));
        $mockHttpClient->addResponse($response);
        $command = new TestCommand();
        $responseDTO = $apiClient->doRequest($command);

        $this->assertInstanceOf(TestResponse::class, $responseDTO);
        $this->assertTrue($responseDTO->isError());

        $errorDTO = $responseDTO->getErrorDTO();
        $this->assertNull($errorDTO->getErrorCode());
        $this->assertNull($errorDTO->getErrorDescription());
        $this->assertSame(405, $errorDTO->getHttpCode());
        $this->assertSame('Method Not Allowed', $errorDTO->getHttpCodePhrase());
    }
}