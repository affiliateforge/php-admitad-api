.. _publisher_reports:

Publisher reports
#################

.. note::
    .. rubric:: Admitad documentation reference:

    https://developers.admitad.com/hc/en-us/articles/7930541032849-Publisher-reports#reports-for-affiliate-programs

.. note::
    .. rubric:: Aggregated/not aggregated reports

    Publishers' reports are provided in aggregated and non-aggregated form (via the ``total`` parameter).
    Since the response format varies greatly depending on this parameter, we have written different commands for aggregated and non-aggregated requests.

~~~~

Reports by ad spaces
********************

Reports by ad spaces (not aggregated, ``total`` = 0)
====================================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\GetReportsByAdSpaces

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\GetReportsByAdSpacesResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportByAdSpace``.
This entity have getters for each field from the response.

~~~~

Reports by ad spaces (aggregated, ``total`` = 1)
================================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\GetAggregatedReportByAdSpaces

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\GetAggregatedReportByAdSpacesResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getReport`` , which returns an object ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\AggregatedReportByAdSpace``.
This entity have getters for each field from the response.

~~~~