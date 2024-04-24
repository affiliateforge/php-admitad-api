
.. _overview:

Package Overview
################

Requirements
============

.. code-block:: php
    :class: no-copybutton

    - php ^8.1
    - any implementation for PSR-18 `Client Interface`. For example, symfony/http-client

Installation
============
.. code-block:: php

    composer require affiliateforge/php-admitad-api

Description
===========

The package provides DTO objects for each (not yet) endpoint in the API.
These DTO objects are distributed by namespace in accordance with their description in the `documentation <https://developers.admitad.com/hc/en-us/articles/7981317512337-Introduction>`_.

Each such DTO accepts in the constructor all the parameters that the endpoint can accept (from the documentation). They will be substituted when the request is executed in the right place (query parameters or the request body).
In response, you will receive a DTO that has getters for each response field from the documentation.

To execute a request, you must create an command DTO object and pass it to the ``Affiliateforge\PhpAdmitadApi\APIClient`` class
in the ``doRequest(CommandDTO $command, array $headers = []): ResponseDTO`` function.

You can pass HTTP headers to method with the parameter ``$headers``
For example, many API endpoints require a token to be specified in the authorization headers.

APIClient Configuration
=======================

You can pass any implementation of the PSR-18 ``Client Interface`` when creating a ``APIClient`` object.
If no implementation is passed, the package will try to find one in your dependencies using the package ``php-http/discovery``.

Example
=======

For example, to get a list of coupons for a website, you first need to get an authorization token, and then
use your token to get a list of coupons. The code for these requests will look like this

.. code-block:: php

    $api = new \Affiliateforge\PhpAdmitadApi\APIClient();

    $clientID = '777xyz';
    $authHash = 'XE5NVl0bU5NcQ==';
    $scopes = ['coupons'];

    $getTokenCmd = new \Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization\GetToken($clientID, $scopes);
    $getTokenResponse = $api->doRequest($getTokenCmd, [
        'Authorization' => 'Basic ' . $authHash,
    ]);

    $headers = [
        'Authorization' => 'Bearer ' . $getTokenResponse->getAccessToken(),
    ];
    $couponsCmd = new \Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetList(limit: 1);
    /** @var \Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetListResponse $couponsResponse */
    $couponsResponse = $api->doRequest($couponsCmd, $headers);

    // check for request success
    if ($couponsResponse->isError()) {
        $error = $couponsResponse->getErrorDTO();
        var_dump([
            'http_code' => $error->getHttpCode(),
            'http_code_phrase' => $error->getHttpCodePhrase(),
            'admitad_error_code' => $error->getErrorCode(),
            'admitad_error_description' => $error->getErrorDescription(),
        ]);
    } else {
        var_dump($couponsResponse->getMeta());
        var_dump($couponsResponse->getResults());
    }
