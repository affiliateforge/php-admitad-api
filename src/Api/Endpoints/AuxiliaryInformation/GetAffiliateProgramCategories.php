<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Psr\Http\Message\ResponseInterface;

class GetAffiliateProgramCategories extends CommandDTO
{
    use GET;

    public function __construct(
        private readonly ?int $offset = null,
        private readonly ?int $limit = null,
        private readonly ?int $campaign = null,
        private readonly ?string $language = null,
        private readonly ?string $orderBy = null,
    ){}

    public function getUrlPath(): string
    {
        return '/categories/';
    }

    public function getQueryParams(): array
    {
        return [
            'offset' => $this->offset,
            'limit' => $this->limit,
            'campaign' => $this->campaign,
            'language' => $this->language,
            'order_by' => $this->orderBy,
        ];
    }

    public function makeResponseDTO(ResponseInterface $response): GetAffiliateProgramCategoriesResponse
    {
        return new GetAffiliateProgramCategoriesResponse($response);
    }
}