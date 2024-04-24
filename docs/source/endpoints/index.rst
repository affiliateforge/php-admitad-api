Endpoints

# Overview

### Requests

> Inside the package, all these DTO's are inheritors from CommandDTO, so in the documentation we can also call them "commands".

In order to complete the request, you must create an appropriate DTO for the endpoint.

All commands are located in the namespace of Affiliateforge\PhpAdmitadApi\Api\Endpoints. Deeper inside, they are also distributed by namespaces, according to their description in the documentation on the Admitad website. For example, the full path for the site's coupon list command will also contain the "coupons" namespace.

Example: Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\getList#

### Responses

response