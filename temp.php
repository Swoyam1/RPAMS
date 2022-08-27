<?php
require_once "vendor/autoload.php";
 
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;

$jar = new \GuzzleHttp\Cookie\CookieJar;
$client = new GuzzleHttp\Client();
$response = $client->request('POST', 'http://localhost/rpams/process/login-process.php', 
    ['form_params' => [
        'email' => 'user@rpams.com',
        'password' => '123',
        'login-submit' => '',
    ],
    'cookies' => $jar,
    'on_stats' => function (TransferStats $stats) use (&$url) {
        $url = $stats->getEffectiveUri();
    }
]);
//print_r($response);
//echo $response->getBody();
echo $url;