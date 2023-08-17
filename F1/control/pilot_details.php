<?php

//API gelen verilere varsayılan değer atıyoruz.
$yearInput = $pilotInput = $round = $givenName = $familyName = $raceName = $country = $position = $point = $constructorId = $grid = $laps = $status = $speed = "";
$topPoints = 0;

//Butona basındı ise.
if (isset($_POST["list"])) {

    $yearInput = $_POST['year'];
    $pilotInput = $_POST['pilotInput'];

    include './model/pilot_details.php';

    if (!isset($response->MRData->RaceTable->Races[0])) {
        echo '<div class="alert alert-danger" role="alert"><center>Wrong round.</center></div>';
    }
    curl_close($ch);
}
include './view/pilot_details.php';