<?php

//API gelen verilere varsayılan değer atıyoruz.
$variabless = $duration = $constructorId = $standingLists = $driverStandings = $position = $givenName = $familyName = $constructorId = $yearInput = $roundInput = "";

//Butona basındı ise.
if (isset($_POST["list"])) {

    $yearInput = $_POST['year'];
    $roundInput = $_POST['round'];

    //Top 5 position
    $url = "http://ergast.com/api/f1/" . $yearInput . "/" . $roundInput . "/driverStandings.json";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $response = json_decode($response);

    if (!isset($response->MRData->StandingsTable->StandingsLists[0])) {
        echo '<div class="alert alert-danger" role="alert"><center>Wrong round.</center></div>';
    }
    curl_close($ch);
}

include "../views/contents/guessContents.php";