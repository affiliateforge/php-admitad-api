<?php

namespace Tests\Unit\Api;

use Affiliateforge\PhpAdmitadApi\Api\ErrorDTO;
use PHPUnit\Framework\TestCase;

class ErrorDTOTest extends TestCase
{
    public function testGetters()
    {
        $dto = new ErrorDTO(
            401,
            "Bad Request",
            "invalid_client",
            "Client id is not found"
        );

        $this->assertSame(401, $dto->getHttpCode());
        $this->assertSame("Bad Request", $dto->getHttpCodePhrase());
        $this->assertSame("invalid_client", $dto->getErrorCode());
        $this->assertSame("Client id is not found", $dto->getErrorDescription());
    }
}