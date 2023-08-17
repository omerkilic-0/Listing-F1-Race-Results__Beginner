<?php

//API gelen verilere varsayılan değer atıyoruz.
$variabless = $duration =$constructorId = $standingLists = $driverStandings = $position = $givenName = $familyName = $constructorId = $yearInput = $roundInput = "";

//Butona basındı ise.
if (isset($_POST["list"])) {

    $yearInput = $_POST['year'];
    $roundInput = $_POST['round'];

    include '../model/guess.php';

    if (!isset($response->MRData->StandingsTable->StandingsLists[0])) {
        echo '<div class="alert alert-danger" role="alert"><center>Wrong round.</center></div>';
    }
    curl_close($ch);
}

include '../view/guess.php';