<?php
$url = "https://ergast.com/api/f1/" . $yearInput . "/" . $roundInput . "/results.json";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$response = json_decode($response);