<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Psr\Http\Message\ResponseInterface;

class GetSystemLanguage extends CommandDTO
{
    use GET;

    public function __construct(
        private readonly string $code
    ){}

    public function getUrlPath(): string
    {
        return "/languages/$this->code/";
    }

    public function makeResponseDTO(ResponseInterface $response): ResponseDTO
    {
        return new GetSystemLanguageResponse($response);
    }
}