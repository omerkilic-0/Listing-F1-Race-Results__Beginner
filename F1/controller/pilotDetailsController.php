<?php

//API gelen verilere varsayılan değer atıyoruz.
$yearInput = $pilotInput = $round = $givenName = $familyName = $raceName = $country = $position = $point = $constructorId = $grid = $laps = $status = $speed = "";
$topPoints = 0;

//Butona basındı ise.
if (isset($_POST["list"])) {

    $yearInput = $_POST['year'];
    $pilotInput = $_POST['pilotInput'];

    //Pilot Details API
    $url = "http://ergast.com/api/f1/" . $yearInput . "/drivers/" . $pilotInput . "/results.json";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $response = json_decode($response);

    if (!isset($response->MRData->RaceTable->Races[0])) {
        echo '<div class="alert alert-danger" role="alert"><center>Wrong pilot.</center></div>';
    }
    curl_close($ch);
}

include "views/contents/pilotDetailsContents.php";