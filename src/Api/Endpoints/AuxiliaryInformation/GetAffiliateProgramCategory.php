<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Psr\Http\Message\ResponseInterface;

class GetAffiliateProgramCategory extends CommandDTO
{
    use GET;

    public function __construct(
        private readonly int $categoryID,
        private readonly ?string $language = null,
    ){}

    public function getUrlPath(): string
    {
        return "/categories/$this->categoryID/";
    }

    public function getQueryParams(): array
    {
        return [
            'language' => $this->language,
        ];
    }

    public function makeResponseDTO(ResponseInterface $response): ResponseDTO
    {
        return new GetAffiliateProgramCategoryResponse($response);
    }
}