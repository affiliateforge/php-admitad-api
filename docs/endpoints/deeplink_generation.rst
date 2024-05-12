.. _deeplink_generation:

Deeplink Generation
####################

.. note::
    .. rubric:: Admitad documentation reference:

    https://developers.admitad.com/hc/en-us/articles/7930476170001-Deeplink-generator

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\DeeplinkGeneration\GenerateDeeplink

.. rubric:: Description

DTO accepts in the constructor the websiteId, advCampaignId, ulp and subids

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\DeeplinkGeneration\GenerateDeeplinkResponse

.. rubric:: Description

GenerateDeeplinkResponse has only one method - ``getDeeplinks``. This method returns an array of generated links
