<?php

//API gelen verilere varsayılan değer atıyoruz.
$raceName = $circuitName = $date = $position = $givenName = $familyName = $name = $grid = $laps = $status = $lap = $time = $speed = $result = $yearInput = $roundInput = $resultCount = "";

//Butona basındı ise.
if (isset($_POST["list"])) {

    $yearInput = $_POST['year'];
    $roundInput = $_POST['round'];

    $url = "https://ergast.com/api/f1/" . $yearInput . "/" . $roundInput . "/results.json";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $response = json_decode($response);

    curl_close($ch);

    if (isset($response->MRData->RaceTable->Races[0]->Results)) {
        $result = $response->MRData->RaceTable->Races[0]->Results;
        $resultCount = count($result);
    } else {
        echo '<div class="alert alert-danger" role="alert"><center>Wrong round.</center></div>';
    }
}

include "views/contents/roundContents.php";