<?php

//API gelen verilere varsayılan değer atıyoruz.
$yearInput = $roundInput = $pitInput = $stop = $lap = $time = $duration = $resultCount = "";

//Butona basındı ise.
if (isset($_POST["list"])) {

    $yearInput = $_POST['year'];
    $roundInput = $_POST['round'];
    $pitInput = $_POST['pitInput'];

    if ($yearInput <= 1957 || $yearInput >= 2024) {

        echo '<div class="alert alert-danger" role="alert"><center>Wrong year. Please enter the year 1958-2023.</center></div>';
    } else {

        include 'model/pitTime.php';

        curl_close($ch);

        if (isset($response->MRData->RaceTable->Races[0]->PitStops)) {
            $result = $response->MRData->RaceTable->Races[0]->PitStops;
            $resultCount = count($result);
        } else {
            echo '<div class="alert alert-danger" role="alert"><center>Wrong value.</center></div>';
        }
    }
}

?>