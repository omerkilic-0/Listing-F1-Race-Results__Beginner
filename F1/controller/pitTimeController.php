<?php


//API gelen verilere varsayılan değer atıyoruz.
$yearInput = $roundInput = $pitInput = $stop = $lap = $time = $duration = $resultCount = "";

//Butona basındı ise.
if (isset($_POST["list"])) {

    $yearInput = $_POST['year'];
    $roundInput = $_POST['round'];
    $pitInput = $_POST['pitInput'];

    $url = "http://ergast.com/api/f1/" . $yearInput . "/" . $roundInput . "/pitstops/" . $pitInput . ".json";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $response = json_decode($response);

    curl_close($ch);

    if (isset($response->MRData->RaceTable->Races[0]->PitStops)) {
        $result = $response->MRData->RaceTable->Races[0]->PitStops;
        $resultCount = count($result);
    } else {
        echo '<div class="alert alert-danger" role="alert"><center>Wrong value.</center></div>';
    }
}

include "../views/contents/pitTimeContents.php";