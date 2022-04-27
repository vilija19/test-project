<?php
include __DIR__ . '/../vendor/autoload.php';

$client = new \GuzzleHttp\Client();
$response = $client->get('https://ithillel.ua/ua');
echo 'Responcr Code - ' . $response->getStatusCode();
echo $response->getBody()->getContents();
