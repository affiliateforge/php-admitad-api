<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization;

use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;

class GetTokenResponse extends ResponseDTO
{
    public function getAccessToken(): string
    {
        return $this->getParsedBody()['access_token'];
    }

    public function getRefreshToken(): string
    {
        return $this->getParsedBody()['refresh_token'];
    }

    public function getExpiresIn(): int
    {
        return $this->getParsedBody()['expires_in'];
    }

    public function getTokenType(): string
    {
        return $this->getParsedBody()['token_type'];
    }

    public function getUserName(): string
    {
        return $this->getParsedBody()['username'];
    }

    public function getFirstName(): string
    {
        return $this->getParsedBody()['first_name'];
    }

    public function getLastName(): string
    {
        return $this->getParsedBody()['last_name'];
    }

    public function getScopes(): array
    {
        return explode(' ', $this->getParsedBody()['scope']);
    }

    public function getLanguage(): string
    {
        return $this->getParsedBody()['language'];
    }

    public function getGroup(): string
    {
        return $this->getParsedBody()['group'];
    }

    public function getId(): int
    {
        return $this->getParsedBody()['id'];
    }

    public function getCode(): string
    {
        return $this->getParsedBody()['code'];
    }
}