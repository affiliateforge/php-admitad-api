<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\DailyReports;

use Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\DailyReport;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HasMetaInResponse;

class GetDailyReportsResponse extends ResponseDTO
{
    use HasMetaInResponse;

    /**
     * @return array<DailyReport>
     */
    public function getResults(): array
    {
        return array_map(
            fn(array $item) => new DailyReport($item),
            $this->getParsedBody()['results'],
        );
    }
}