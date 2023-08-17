<?php

//API gelen verilere varsayılan değer atıyoruz.
$raceName = $circuitName = $date = $position = $givenName = $familyName = $name = $grid = $laps = $status = $lap = $time = $speed = $result = $yearInput = $roundInput = $resultCount = "";

//Butona basındı ise.
if (isset($_POST["list"])) {

    $yearInput = $_POST['year'];
    $roundInput = $_POST['round'];

    include '../model/round.php';

    curl_close($ch);

    if (isset($response->MRData->RaceTable->Races[0]->Results)) {
        $result = $response->MRData->RaceTable->Races[0]->Results;
        $resultCount = count($result);
    } else {
        echo '<div class="alert alert-danger" role="alert"><center>Wrong round.</center></div>';
    }
}
include '../view/round.php'; ?>