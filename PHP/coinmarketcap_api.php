<?php

$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$api_key = $config['api']['api_key'];

$parameters = [
  'start' => '1',
  'limit' => '5000',
  'convert' => 'USD'
];

$headers = [
  'Accepts: application/json',
  'X-CMC_PRO_API_KEY: '.$api_key
];
$qs = http_build_query($parameters);
$request = "{$url}?{$qs}";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $request,
  CURLOPT_HTTPHEADER => $headers,
  CURLOPT_RETURNTRANSFER => 1
));

$response = curl_exec($curl);
$json = json_decode($response);
$data = $json->data;

curl_close($curl);

?>
