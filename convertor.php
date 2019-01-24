<?php

$access_key = 'bb305be323577f320feda39f319bfc7e';
$from = 'USD';
$to = $_GET['currency'];
$amount = $_GET['amount'];

$url = 'http://apilayer.net/api/historical?access_key='.$access_key.'&date=2005-02-01';

$result = file_get_contents($url);
$result = json_decode($result);

if ($result->success) {
    $currency = $from.$to;
    $response =  $result->quotes->$currency * $amount . ' ' .$to;
    $response_arr = ['result' => $response];
    http_response_code(200);
    echo json_encode($response_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([
        'result' => 'Произошла ошибка'
    ]);
}