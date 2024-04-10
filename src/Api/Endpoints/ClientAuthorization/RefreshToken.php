<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\POST;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Psr\Http\Message\ResponseInterface;

class RefreshToken extends CommandDTO
{
    use POST;

    public function __construct(
        private readonly string $clientID,
        private readonly string $clientSecret,
        private readonly string $refreshToken,
    ){}

    public function getUrlPath(): string
    {
        return '/token/';
    }

    public function getQueryParams(): array
    {
        return [
            'grant_type' => 'refresh_token',
            'client_id' => $this->clientID,
            'client_secret' => $this->clientSecret,
            'refresh_token' => $this->refreshToken,
        ];
    }

    public function makeResponseDTO(ResponseInterface $response): GetTokenResponse
    {
        return new GetTokenResponse($response);
    }
}