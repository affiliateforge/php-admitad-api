.. _refresh_token:

Access Token Refresh
####################

.. note::
    Unlike other routes, the endpoint for refreshing the authorization token is located in the same namespace as receiving the authorization token.

.. note::
    .. rubric:: Admitad documentation reference:

    https://developers.admitad.com/hc/en-us/articles/7930242014353-Access-token-refresh

Command
*******
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization\RefreshToken

.. rubric:: Description

DTO accepts in the constructor the cleintID, clientSecret and refreshToken from ``GetTokenResponse``

Response
********
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization\GetTokenResponse

.. rubric:: Description

The Response class will be the same as for command ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization\GetToken``
