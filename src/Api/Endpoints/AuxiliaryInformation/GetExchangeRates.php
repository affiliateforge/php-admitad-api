<?php

namespace Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation;

use Affiliateforge\PhpAdmitadApi\Api\CommandDTO;
use Affiliateforge\PhpAdmitadApi\Api\ResponseDTO;
use Affiliateforge\PhpAdmitadApi\Api\Traits\HttpMethods\GET;
use Psr\Http\Message\ResponseInterface;

class GetExchangeRates extends CommandDTO
{
    use GET;

    public function __construct(
        private readonly string $fromCurrencyCode,
        private readonly string $toCurrencyCode,
        private readonly \DateTime $date,
    ){}

    public function getUrlPath(): string
    {
        return '/currencies/rate/';
    }

    public function getQueryParams(): array
    {
        return [
            'base' => $this->fromCurrencyCode,
            'target' => $this->toCurrencyCode,
            'date' => $this->date->format('d.m.Y')
        ];
    }

    public function makeResponseDTO(ResponseInterface $response): GetExchangeRatesResponse
    {
        return new GetExchangeRatesResponse($response);
    }
}