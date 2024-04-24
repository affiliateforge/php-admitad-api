<?php

require_once "vendor/autoload.php";


//$clientID = 'D1EpJJCmSpsITNZ2Us7vEllvln245n'; // мой
$clientID = '7d8abeb711ae7a15aa3416fc187703'; // Стаса
//$clientID = 'D1EpJJCmSpsITNZ2Us7vEllvln245nad'; // неверный
//$clientSecret = '0Ct5qMswm677kNEPIppS0FM75sCeL1'; // мой
$clientSecret = 'mavRl38jwVEHhpGRi9b1TSbKvi5TXH'; // Стаса
//$authHash = 'RDFFcEpKQ21TcHNJVE5aMlVzN3ZFbGx2bG4yNDVuOjBDdDVxTXN3bTY3N2tORVBJcHBTMEZNNzVzQ2VMMQ=='; // мой
$authHash = 'N2Q4YWJlYjcxMWFlN2ExNWFhMzQxNmZjMTg3NzAzOm1hdlJsMzhqd1ZFSGhwR1JpOWIxVFNiS3ZpNVRYSA=='; // Стаса

$api = new \Affiliateforge\PhpAdmitadApi\APIClient();
$scopes = [
    'coupons',
    'coupons_for_website',
    'public_data',
    'websites',
    'advcampaigns',
    'deeplink_generator',
    'statistics',
];
$tokenCmd = new \Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization\GetToken($clientID, $scopes);

/** @var \Affiliateforge\PhpAdmitadApi\Api\Endpoints\ClientAuthorization\GetTokenResponse $getTokenResponse */
$getTokenResponse = $api->doRequest($tokenCmd, [
    'Authorization' => 'Basic ' . $authHash,
]);

$headers = [
    'Authorization' => 'Bearer ' . $getTokenResponse->getAccessToken(),
];


//$adSpaceCouponList = new \Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetAdSpaceCouponsList(579740, limit: 1);
///** @var \Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetAdSpaceCouponsListResponse $adSpaceCouponListResponse */
//$adSpaceCouponListResponse = $api->doRequest($adSpaceCouponList, $headers);
///**
//{"_meta":{"count":8,"limit":1,"offset":0},"results":[{"status":"active","rating":"4.82","campaign":{"id":2930,"name":"Акушерство","site_url":"https://www.akusherstvo.ru/"},"description":"","short_name":"Скидка 500 рублей на первый заказ от 3500 рублей","exclusive":false,"date_end":"2024-05-31T23:59:00","date_start":"2024-03-01T00:00:00","id":670284,"regions":["RU"],"discount":"500 ₽","types":[{"id":2,"name":"Discount on an order"}],"image":"http://cdn.admitad.com/campaign/images/2021/4/5/2930-58a7fa5766c5d2f5.svg","species":"promocode","categories":[{"id":1,"name":"Toys, Kids & Babies"}],"name":"Скидка 500 рублей на первый заказ от 3500 рублей","language":"ru","is_unique":false,"is_personal":false,"promocode":"admitad2024","frameset_link":"https://dorinebeaumont.com/coupon/jgmk2fspjv767c32d944748f778371/?erid=LatgBaLiF","goto_link":"https://dorinebeaumont.com/g/9fn3r3p0wu767c32d944748f778371/?i=3&erid=LatgBaLiF"}]}
// */
//
//$adSpaceCouponSingle = new \Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleAdSpaceCoupon(670284, 579740);
///** @var \Affiliateforge\PhpAdmitadApi\Api\Endpoints\Coupons\GetSingleAdSpaceCouponResponse $adSpaceCouponSingleResponse */
//$adSpaceCouponSingleResponse = $api->doRequest($adSpaceCouponSingle, $headers);
///**
//{"status":"active","rating":"4.82","campaign":{"id":2930,"name":"Акушерство","site_url":"https://www.akusherstvo.ru/"},"description":"","short_name":"Скидка 500 рублей на первый заказ от 3500 рублей","exclusive":false,"date_end":"2024-05-31T23:59:00","date_start":"2024-03-01T00:00:00","id":670284,"regions":["RU"],"discount":"500 ₽","types":[{"id":2,"name":"Discount on an order"}],"image":"http://cdn.admitad.com/campaign/images/2021/4/5/2930-58a7fa5766c5d2f5.svg","species":"promocode","categories":[{"id":1,"name":"Toys, Kids & Babies"}],"name":"Скидка 500 рублей на первый заказ от 3500 рублей","language":"ru","is_unique":false,"is_personal":false,"promocode":"admitad2024","frameset_link":"https://dorinebeaumont.com/coupon/jgmk2fspjv767c32d944748f778371/?erid=LatgBaLiF","goto_link":"https://dorinebeaumont.com/g/9fn3r3p0wu767c32d944748f778371/?i=3&erid=LatgBaLiF"}
// */

//$dl = new \Affiliateforge\PhpAdmitadApi\Api\Endpoints\DeeplinkGeneration\GenerateDeeplink(582754, 17101, ulp: 'https://mi-shop.com/?=wasya', subid1: 'white_sneakers',  subid4: '4ad');
///** @var \Affiliateforge\PhpAdmitadApi\Api\Endpoints\DeeplinkGeneration\GenerateDeeplinkResponse $dlR */
//$dlR = $api->doRequest($dl, $headers);
//var_dump($dlR->getOriginalResponse()->getBody()->getContents());
//die();

//$report1 = new \Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\GetReportsByAdSpaces(limit: 1);
//$reportResponse1 = $api->doRequest($report1, $headers);


$startDate = (new DateTime())->setDate(2020, 12, 30);
$endDate = (new DateTime())->setDate(2022, 1, 1);
$report2 = new \Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\GetReportsByAdSpaces(limit: 1, dateStart: $startDate, dateEnd: $endDate, total: 1);
$reportResponse2 = $api->doRequest($report2, $headers);

var_dump(
//    $reportResponse1->getOriginalResponse()->getBody()->getContents(),
    $reportResponse2->getOriginalResponse()->getBody()->getContents(),
);
die();


/**
$cmd = new \Affiliateforge\PhpAdmitadApi\Api\Endpoints\PublisherReports\GetReportsByActions();
$cmdResponse = $api->doRequest($cmd, $headers);
var_dump([
    'a' => $cmdResponse->getOriginalResponse()->getBody()->getContents(),
]);
*/


$cmd = new \Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemLanguage('pl');
/** @var \Affiliateforge\PhpAdmitadApi\Api\Endpoints\AuxiliaryInformation\GetSystemLanguageResponse $cmdResponse */
$cmdResponse = $api->doRequest($cmd, $headers);
var_dump([
    'a' => $cmdResponse->getOriginalResponse()->getBody()->getContents(),
    'b' => $cmdResponse->getLanguage(),
    // 'm' => $cmdResponse->getMeta(),
]);
