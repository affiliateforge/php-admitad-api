.. _publisher_reports:

Publisher reports
#################

.. note::
    .. rubric:: Admitad documentation reference:

    https://developers.admitad.com/hc/en-us/articles/7930541032849-Publisher-reports

.. warning::
    .. rubric:: Aggregated/not aggregated reports

    Publishers' reports are provided in aggregated and non-aggregated form (via the ``total`` parameter).
    Since the response format varies greatly depending on this parameter, we have written different commands for aggregated and non-aggregated requests.

~~~~

Reports by ad spaces
********************
.. note::
    .. rubric:: API endpoint URL

    https://api.admitad.com/statistics/websites/

~~~~

Reports by ad spaces (not aggregated, ``total`` = 0)
====================================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByAdSpaces\GetReportsByAdSpaces

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByAdSpaces\GetReportsByAdSpacesResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportByAdSpace``.
This entity have getters for each field from the response. The dates from the response are returned as strings.

~~~~

Reports by ad spaces (aggregated, ``total`` = 1)
================================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByAdSpaces\GetAggregatedReportByAdSpaces

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\AggregatedReportResponse

.. rubric:: Description

The response will contain the method ``getReport`` , which returns an object ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\AggregatedReport``.
This entity have getters for each field from the response.

~~~~

Reports for affiliate programs
******************************
.. note::
    .. rubric:: API endpoint URL

    https://api.admitad.com/statistics/campaigns/

~~~~

Reports for affiliate programs (not aggregated, ``total`` = 0)
==============================================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsForAffiliatePrograms\GetReportsForAffiliatePrograms

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsForAffiliatePrograms\GetReportsForAffiliateProgramsResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportForAffiliateProgram``.
This entity have getters for each field from the response. The dates from the response are returned as strings.

~~~~

Reports for affiliate programs (aggregated, ``total`` = 1)
==========================================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsForAffiliatePrograms\GetAggregatedReportForAffiliatePrograms

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\AggregatedReportResponse

.. rubric:: Description

The response will contain the method ``getReport`` , which returns an object ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\AggregatedReport``.
This entity have getters for each field from the response.

~~~~

Daily reports
*************
.. note::
    .. rubric:: API endpoint URL

    https://api.admitad.com/statistics/dates/

~~~~

Daily reports (not aggregated, ``total`` = 0)
=============================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\DailyReports\GetDailyReports

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\DailyReports\GetDailyReportsResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\DailyReport``.
This entity have getters for each field from the response. The dates from the response are returned as strings.

~~~~

Daily reports (aggregated, ``total`` = 1)
=========================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\DailyReports\GetAggregatedDailyReport

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\AggregatedReportResponse

.. rubric:: Description

The response will contain the method ``getReport`` , which returns an object ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\AggregatedReport``.
This entity have getters for each field from the response.

~~~~

Monthly reports
***************
.. note::
    .. rubric:: API endpoint URL

    https://api.admitad.com/statistics/months/

~~~~

Monthly reports (not aggregated, ``total`` = 0)
===============================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\MonthlyReports\GetMonthlyReports

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\MonthlyReports\GetMonthlyReportsResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\MonthlyReport``.
This entity have getters for each field from the response. The dates from the response are returned as strings.

~~~~

Monthly reports (aggregated, ``total`` = 1)
===========================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\MonthlyReports\GetAggregatedMonthlyReport

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\AggregatedReportResponse

.. rubric:: Description

The response will contain the method ``getReport`` , which returns an object ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\AggregatedReport``.
This entity have getters for each field from the response.

~~~~

Reports by actions
******************
.. note::
    .. rubric:: API endpoint URL

    https://api.admitad.com/statistics/actions/

~~~~

Reports by actions (not aggregated, ``total`` = 0)
==================================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByActions\GetReportsByActions

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByActions\GetReportsByActionsResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportByAction``.
This entity have getters for each field from the response. The dates from the response are returned as strings.

For the ``getPositions`` method will be returned array of ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByActions\Position`` with getters for each field

~~~~

Reports by actions (aggregated, ``total`` = 1)
==============================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByActions\GetAggregatedReportByActions

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\AggregatedReportResponse

.. rubric:: Description

The response will contain the method ``getReport`` , which returns an object ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\AggregatedReport``.
This entity have getters for each field from the response.

~~~~

Reports by subID
******************
.. note::
    .. rubric:: API endpoint URL

    https://api.admitad.com/statistics/sub_ids/

~~~~

Reports by subID (not aggregated, ``total`` = 0)
==================================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySubID\GetReportsBySubID

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySubID\GetReportsBySubIDResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportBySubID``.
This entity have getters for each field from the response. The dates from the response are returned as strings.

~~~~

Reports by subID (aggregated, ``total`` = 1)
==============================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySubID\GetAggregatedReportBySubID

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\AggregatedReportResponse

.. rubric:: Description

The response will contain the method ``getReport`` , which returns an object ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\AggregatedReport``.
This entity have getters for each field from the response.

~~~~

Reports by sources
******************
.. note::
    .. rubric:: API endpoint URL

    https://api.admitad.com/statistics/sources/

~~~~

Reports by sources (not aggregated, ``total`` = 0)
==================================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySources\GetReportsBySources

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySources\GetReportsBySourcesResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportBySource``.
This entity have getters for each field from the response. The dates from the response are returned as strings.

~~~~

Reports by sources (aggregated, ``total`` = 1)
==============================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsBySources\GetAggregatedReportBySources

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\AggregatedReportResponse

.. rubric:: Description

The response will contain the method ``getReport`` , which returns an object ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\AggregatedReport``.
This entity have getters for each field from the response.

~~~~

Reports by keywords
*******************
.. note::
    .. rubric:: API endpoint URL

    https://api.admitad.com/statistics/keywords/

~~~~

Reports by keywords (not aggregated, ``total`` = 0)
===================================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByKeywords\GetReportsByKeywords

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByKeywords\GetReportsByKeywordsResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\ReportByKeyword``.
This entity have getters for each field from the response. The dates from the response are returned as strings.

~~~~

Reports by keywords (aggregated, ``total`` = 1)
===============================================

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\ReportsByKeywords\GetAggregatedReportByKeywords

.. rubric:: Description

The constructor has named arguments for every optional field except total. Dates are passed as ``\DateTime`` objects.
Total is not accepted (see the description about aggregated reports at the beginning of this description).

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\AggregatedReportResponse

.. rubric:: Description

The response will contain the method ``getReport`` , which returns an object ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\Entities\AggregatedReport``.
This entity have getters for each field from the response.