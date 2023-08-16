<?php

//API gelen verilere varsayılan değer atıyoruz.
$yearInput = $pilotInput = $round = $givenName = $familyName = $raceName = $circuitName = $country = $position = $races = $driver = $point = "";
$topPoints = 0;

//Butona basındı ise.
if (isset($_POST["list"])) {

    $yearInput = $_POST['year'];
    $pilotInput = $_POST['pilotInput'];

    include 'model/pilot_details.php';

    if (!isset($response->MRData->RaceTable->Races[0]) || !isset($response_2->MRData->RaceTable->Races[0])) {
        echo '<div class="alert alert-danger" role="alert"><center>Wrong round.</center></div>';
    }
    curl_close($ch);
}
