.. _coupons:

Coupons
#######

List of coupons
***************

.. note::
    .. rubric:: Admitad documentation reference:

    https://developers.admitad.com/hc/en-us/articles/7930482029585-Coupons#list-of-coupons

~~~~

List
====

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetList

.. rubric:: Description

The constructor has named arguments for each optional field. Dates are passed as ``\DateTime`` objects.

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetListResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Coupon``.
This entity have getters for each field from the response.
Dates are returned as objects of the ``\DateTime`` class.
For Campaign and Type objects, the methods will return DTO oblects with getters.

~~~~

Single
======

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetList

.. rubric:: Description

The constructor accepts the required ID of the requested coupon

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetListResponse

.. rubric:: Description

The response will contain method ``getCoupon``, which returns an object of class ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Coupon``.





List of coupons for the ad space
********************************

.. note::
    .. rubric:: Admitad documentation reference:

    https://developers.admitad.com/hc/en-us/articles/7930482029585-Coupons#list-of-coupons-for-the-ad-space

~~~~

List
====

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetAdSpaceCouponsList

.. rubric:: Description

The constructor has named arguments for each field. Dates are passed as ``\DateTime`` objects. The spaceID parameter is required.

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetAdSpaceCouponsListResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\AdSpaceCoupon``.
This entity have getters for each field from the response.
Dates are returned as objects of the ``\DateTime`` class.
For Campaign and Type objects, the methods will return DTO oblects with getters.

~~~~

Single
======

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleAdSpaceCoupon

.. rubric:: Description

The constructor accepts the required ID and spaceId of the requested coupon

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleAdSpaceCouponResponse

.. rubric:: Description

The response will contain method ``getAdSpaceCoupon``, which returns an object of class ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\AdSpaceCoupon``.




Coupon categories
*****************

.. note::
    .. rubric:: Admitad documentation reference:

    https://developers.admitad.com/hc/en-us/articles/7930482029585-Coupons#coupon-categories

~~~~

List
====

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetCouponCategoriesList

.. rubric:: Description

The constructor accepts optional named arguments offset and limit

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetCouponCategoriesListResponse

.. rubric:: Description

The response will contain the ``getMeta`` method, which returns a DTO with getters for each field from the meta.
Also, the response will contain the method ``getResults`` , which returns an array of objects ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Category``.
This entity have getters for each field from the response.

~~~~

Single
======

Command
^^^^^^^
.. rubric:: Class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleCouponCategory

.. rubric:: Description

The constructor accepts the required ID of the requested category

Response
^^^^^^^^
.. rubric:: Response class
.. code-block:: php

    Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleCouponCategoryResponse

.. rubric:: Description

The response will contain method ``getCategory``, which returns an object of class ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\Entities\Category``.
