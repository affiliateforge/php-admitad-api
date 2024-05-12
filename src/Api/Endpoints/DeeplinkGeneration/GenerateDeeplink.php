<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\DeeplinkGeneration;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Psr\Http\Message\ResponseInterface;

class GenerateDeeplink extends CommandDTO
{
    use GET;

    public function __construct(
        private readonly int     $websiteId,
        private readonly int     $advCampaignId,
        private readonly string  $ulp,
        private readonly ?string $subid = null,
        private readonly ?string $subid1 = null,
        private readonly ?string $subid2 = null,
        private readonly ?string $subid3 = null,
        private readonly ?string $subid4 = null,
    ){}

    public function getUrlPath(): string
    {
        return "/deeplink/$this->websiteId/advcampaign/$this->advCampaignId/";
    }

    public function getQueryParams(): array
    {
        $params = [
            'subid' => $this->subid,
            'subid1' => $this->subid1,
            'subid2' => $this->subid2,
            'subid3' => $this->subid3,
            'subid4' => $this->subid4,
            'ulp' => $this->ulp,
        ];

        return array_filter($params);
    }

    public function makeResponseDTO(ResponseInterface $response): GenerateDeeplinkResponse
    {
        return new GenerateDeeplinkResponse($response);
    }
}