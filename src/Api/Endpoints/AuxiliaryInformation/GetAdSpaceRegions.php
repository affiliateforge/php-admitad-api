<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Psr\Http\Message\ResponseInterface;

class GetAdSpaceRegions extends CommandDTO
{
    use GET;

    public function __construct(
        private readonly ?int $offset = null,
        private readonly ?int $limit = null,
    ){}

    public function getUrlPath(): string
    {
        return '/websites/regions/';
    }

    public function getQueryParams(): array
    {
        return [
            'offset' => $this->offset,
            'limit' => $this->limit,
        ];
    }

    public function makeResponseDTO(ResponseInterface $response): GetAdSpaceRegionsResponse
    {
        return new GetAdSpaceRegionsResponse($response);
    }
}