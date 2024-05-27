<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\MonthlyReports;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\MonthlyReport;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetMonthlyReportsResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<MonthlyReport>
     */
    public function getResults(): array
    {
        return array_map(
            fn(array $item) => new MonthlyReport($item),
            $this->getParsedBody()['results'],
        );
    }
}