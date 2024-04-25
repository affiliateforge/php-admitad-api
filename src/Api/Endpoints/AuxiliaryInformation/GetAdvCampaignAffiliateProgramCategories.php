<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Psr\Http\Message\ResponseInterface;

class GetAdvCampaignAffiliateProgramCategories extends CommandDTO
{
    use GET;

    public function __construct(
        private readonly int $campaign,
        private readonly ?int $offset = null,
        private readonly ?int $limit = null,
        private readonly ?string $language = null,
        private readonly ?string $orderBy = null,
    ){}

    public function getUrlPath(): string
    {
        return "/categories/advcampaign/$this->campaign/";
    }

    public function getQueryParams(): array
    {
        return [
            'offset' => $this->offset,
            'limit' => $this->limit,
            'language' => $this->language,
            'order_by' => $this->orderBy,
        ];
    }

    public function makeResponseDTO(ResponseInterface $response): GetAffiliateProgramCategoriesResponse
    {
        return new GetAffiliateProgramCategoriesResponse($response);
    }
}