<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\POST;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Psr\Http\Message\ResponseInterface;

class GetToken extends CommandDTO
{
    use POST;

    public function __construct(
        private readonly string $clientID,
        private readonly array $scope
    ){}

    public function getUrlPath(): string
    {
        return '/token/';
    }

    public function getQueryParams(): array
    {
        return [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientID,
            'scope' => implode(' ', $this->scope),
        ];
    }

    public function makeResponseDTO(ResponseInterface $response): GetTokenResponse
    {
        return new GetTokenResponse($response);
    }
}