.. _client_authorization:

Client Authorization
####################

.. note::
    .. rubric:: Admitad documentation reference:

    https://developers.admitad.com/hc/en-us/articles/7930256407825-Client-authorization

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization\GetToken

.. rubric:: Description

DTO accepts in the constructor the clientID and the requested scopes as an array

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization\GetTokenResponse

.. rubric:: Description

The ``GetTokenResponse`` will contain methods for each field from the documentation. For example: ``getAccessToken(): string``
