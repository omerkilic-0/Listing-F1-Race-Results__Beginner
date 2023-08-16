<table class="table">
    <form method="POST" style="float: left;">
        <input type="number" name="year" id="year" class="m-2" style="border-radius: 3px; width: 150px;" placeholder="Year (2012-2023)" min="2012" max="2023" required>
        <input type="number" name="round" id="round" class="m-2" style="border-radius: 3px; width: 150px;" placeholder="Round" min="1" required>
        <input type="number" name="pitInput" id="pitInput" class="m-2" style="border-radius: 3px; width: 150px;" placeholder="Pit Stop" min="1" max="4" required>
        <button type="submit" class="btn btn-primary" class="m-1" name="list" id="list">List</button>
    </form>
    <thead>
        <tr>
            <th>Year:</th>
            <td style="color: blue;"><b><?= $yearInput ?></b></td>
            <th>Round:</th>
            <td style="color: blue;"><b><?= $roundInput ?></b></td>
            <th>Stop</th>
            <td style="color: blue;"><?= $pitInput ?></td>
        </tr>
        <tr>
            <th scope="col">Pilot Name</th>
            <th scope="col">Stop</th>
            <th scope="col">Lap</th>
            <th scope="col">Time</th>
            <th scope="col">Duration</th>
        </tr>
    </thead>
    <tbody>

        <?php

        if (isset($_POST["list"])) {

            if (isset($response->MRData->RaceTable->Races[0]->PitStops)) {

                $pitStop = $response->MRData->RaceTable->Races[0]->PitStops;

                for ($x = 0; $x < $resultCount; $x++) {

                    $result = $pitStop[$x];

                    $pilotName = $result->driverId;
                    $lap = $result->lap;
                    $stop = $result->stop;
                    $time = $result->time;
                    $duration = $result->duration;

        ?>
                    <tr>
                        <td><?= $pilotName ?: ""; ?></td>
                        <td><?= $stop ?: ""; ?></td>
                        <td><?= $lap ?: ""; ?></td>
                        <td><?= $time ?: ""; ?></td>
                        <td><?= $duration ?: ""; ?></td>
                    </tr>
        <?php }
            }
        } ?>

</table>