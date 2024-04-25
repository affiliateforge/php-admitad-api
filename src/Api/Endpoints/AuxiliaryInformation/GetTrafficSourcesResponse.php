<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\TrafficSource;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetTrafficSourcesResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<TrafficSource>
     */
    public function getResults(): array
    {
        return array_map(
            fn (array $item) => new TrafficSource($item),
            $this->getParsedBody()['results']
        );
    }
}