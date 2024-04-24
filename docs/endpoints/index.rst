.. _endpoints:

Endpoints
#########

Requests
========

.. note::
    Inside the package, all request DTO's are extends from CommandDTO abstract class, so in the documentation we can also call them "commands".

To execute a request, you must create a specific Command DTO object and pass it to method ``doRequest`` on ``APIClient``

.. rubric:: How to find the right Command DTO class?

All commands for are located in the namespace of ``Affiliateforge\PhpAdmitadApi\Api\Endpoints``.
Deeper inside, they are also distributed by namespaces, according to their description in the documentation on the `Admitad website <https://developers.admitad.com/hc/en-us>`_.
For example, the full path for `the website's coupon list <https://developers.admitad.com/hc/en-us/articles/7930482029585-Coupons#list-of-coupons>`_ command will also contain the "Coupons" namespace.

Example: ``Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetList``

Responses
=========

Executing each Command via the ``APIClient`` returns a specific DTO.

Each command has its own DTO class attached to it.
When the APIClient executes a request, it will call the ``makeResponseDTO`` function
on the Command class, passing the HttpResponse to the constructor.

All response DTOs are inheritors of the ``Affiliateforge\PhpAdmitadApi\Api\ResponseDTO`` class and have function ``getOriginalResponse``
to get the original HTTP response.

Many endpoints have meta information in their response. For such endpoints, the response will have the `getMeta` method,
which returns an DTO with getters for all fields


HTTP/API Errors
===============

Each response object has methods to determine the success of the response.
For example, if you want to get a list of coupons, but your token has not been received for the corresponding scope, you will receive an error from the API.
To check the success of the request, you can call the ``isError()`` and ``getErrorDTO()`` methods on each response.
The ErrorDTO will contain methods for obtaining error information: http codes/messages, as well as error codes and descriptions provided by the Admitad API.

Endpoints specification
=======================

.. toctree::
    :maxdepth: 1

    coupons
    client_authorization
    refresh_token
