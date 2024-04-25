.. _auxiliary_information:

Auxiliary information
#####################

.. note::
    .. rubric:: Admitad documentation reference:

    https://developers.admitad.com/hc/en-us/articles/7930496407825-Auxiliary-information

~~~~

Types of ad spaces
==================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAdSpaceTypes

.. rubric:: Description

The constructor has named arguments for each optional field.

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAdSpaceTypesResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults``, which returns an array of strings.

~~~~

Ad space regions
================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAdSpaceRegions

.. rubric:: Description

The constructor has named arguments for each optional field.

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAdSpaceRegionsResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults``, which returns an array of strings.

~~~~


Categories of affiliate programs
================================


List of affiliate programs categories
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^


Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAffiliateProgramCategories

.. rubric:: Description

The constructor has named arguments for each optional field.

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAffiliateProgramCategoriesResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\AffiliateProgramCategory``.
This entity have getters for each field from the response.

For the ``getParent`` function, the methods will return DTO object of same class.


List of categories of an affiliate program
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAdvCampaignAffiliateProgramCategories

.. rubric:: Description

The constructor has named arguments for each optional field, ``campaign`` is required.

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAffiliateProgramCategoriesResponse

.. rubric:: Description

The Response class will be the same as for command ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAffiliateProgramCategories``


Category of an affiliate program
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAffiliateProgramCategory

.. rubric:: Description

The constructor accepts optional named argument language and required argument categoryID.

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetAffiliateProgramCategoryResponse

.. rubric:: Description

Response will contain the method ``getCategory`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\AffiliateProgramCategory``.
This entity have getters for each field from the response.

~~~~

System languages
================

List
^^^^

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemLanguages

.. rubric:: Description

The constructor accepts optional named arguments.

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemLanguagesResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\SystemLanguage``.
This entity have getters for each field from the response.

Single
^^^^^^

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemLanguage

.. rubric:: Description

The constructor accepts required argument - code.

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemLanguageResponse

.. rubric:: Description

The response will contain the ``getLanguage`` method, which returns a DTO ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\SystemLanguage``.
This entity have getters for each field from the response.

~~~~

System currencies
=================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemCurrencies

.. rubric:: Description

The constructor accepts optional named arguments.

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemCurrenciesResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\SystemCurrency``.
This entity have getters for each field from the response.

~~~~

Exchange rates
==============

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetExchangeRates

.. rubric:: Description

The constructor accepts required arguments: fromCurrencyCode, toCurrencyCode and ``\DateTime $date``

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetExchangeRatesResponse

.. rubric:: Description

Also, the response will contain the method ``getExchangeRate`` , which returns an object ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\ExchangeRate``.
This entity have getters for each field from the response.

~~~~

Traffic sources
===============

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetTrafficSources

.. rubric:: Description

The constructor has named arguments for each optional field.

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetTrafficSourcesResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\Entities\TrafficSource``.
This entity have getters for each field from the response.
