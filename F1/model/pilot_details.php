<?php

//Pilot Details API
$url = "http://ergast.com/api/f1/".$yearInput."/drivers/".$pilotInput."/qualifying.json";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$response = json_decode($response);

//points
$url_2 = "https://ergast.com/api/f1/".$yearInput."/drivers/".$pilotInput."/results.json";

$ch_2 = curl_init($url_2);
curl_setopt($ch_2, CURLOPT_RETURNTRANSFER, true);
$response_2 = curl_exec($ch_2);
$response_2 = json_decode($response_2);