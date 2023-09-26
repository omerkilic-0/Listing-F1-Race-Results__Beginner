<?php

//Top 5 position
$url = "http://ergast.com/api/f1/" . $yearInput . "/" . $roundInput . "/driverStandings.json";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$response = json_decode($response);