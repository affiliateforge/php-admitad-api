<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsForAffiliatePrograms;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportForAffiliateProgram;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetReportsForAffiliateProgramsResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<ReportForAffiliateProgram>
     */
    public function getResults(): array
    {
        return array_map(
            fn(array $item) => new ReportForAffiliateProgram($item),
            $this->getParsedBody()['results'],
        );
    }
}