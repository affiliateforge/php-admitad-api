# php-admitad-api

The package provides [Admitad API Client](https://developers.admitad.com/hc/en-us/articles/7981317512337-Introduction).  

# Requirements

- `php ^8.1`
- any implementation for PSR-18 `Client Interface`. For example, `symfony/http-client`

# Installation

`composer require affiliateforge/php-admitad-api`

# Usage

### Example
For example, to get a list of coupons for a website, you first need to get an authorization token, and then 
use your token to get a list of coupons. The code for these requests will look like this

```
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
$couponsResponse = $api->doRequest($couponsCmd, $headers);

// check for request success
if ($couponsResponse->isError()) {
    $error = $couponsResponse->getErrorDTO();
    var_dump([
        'httpCode' => $error->getHttpCode(),
        'httpCodePhrase' => $error->getHttpCodePhrase(),
        'admitad_error_code' => $error->getErrorCode(),
        'admitad_error_description' => $error->getErrorDescription(),
    ]);
} else {
    var_dump($couponsResponse->getResults());
}
```

### Description

The package provides DTO objects for each (not yet) endpoint in the API. These DTO objects are distributed by namespace in accordance with their description in the documentation.

Each such DTO accepts in the constructor all the parameters that the endpoint can accept (from the documentation). They will be substituted when the request is executed in the right place (query parameters or the request body).
In response, you will receive a DTO that has getters for each response field from the documentation.

To execute a request, you must create an DTO object and pass it to the `Affiliateforge\PhpAdmitadApi\APIClient` class in the `doRequest(CommandDTO $command, array $headers = []): ResponseDTO`.

Many API endpoints require a token to be specified in the authorization headers. Headers are passed in the `$headers` parameter of the `doRequest` method.

To receive a token, you should use the DTO `Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization\GetToken`.
In the constructor you should specify the `clientID` and the requested scopes. 
In response, you will receive a DTO for this endpoint, from which you can receive the token itself.

Then, you must pass this token in the `Authorization` header for every request for other endpoints.

### APIClient Configuration

You can pass any implementation of the PSR-18 `Client Interface` when creating a `APIClient` object. If no implementation is passed, the package will try to find one in your dependencies using the package `php-http/discovery`.

