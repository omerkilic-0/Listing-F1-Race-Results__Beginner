<table class="table">
    <form method="POST" style="float: left;">
        <input type="number" name="year" id="year" class="m-2" style="border-radius: 3px; width: 150px;" placeholder="Year (1958-2023)" min="1958" max="2023" required>
        <input type="number" name="round" id="round" class="m-2" style="border-radius: 3px; width: 150px;" placeholder="Round" min="1" required>
        <button type="submit" class="btn btn-primary" class="m-1" name="list" id="list">List</button>
    </form>
    <thead>
        <tr>
            <th>Year:</th>
            <td style="color: blue;"><b><?= $yearInput ?></b></td>
            <th>Round:</th>
            <td style="color: blue;"><b><?= $roundInput ?></b></td>
        </tr>
        <tr>
            <th scope="col">Position</th>
            <th scope="col">Race Name</th>
            <th scope="col">Circuit Name</th>
            <th scope="col">Pilot Name</th>
            <th scope="col">Driver</th>
            <th scope="col">Date</th>
            <th scope="col">Grid</th>
            <th scope="col">Laps</th>
            <th scope="col">Status</th>
            <th scope="col">Points</th>
            <th scope="col">Race Time</th>
            <th scope="col">KM/h</th>
        </tr>
    </thead>
    <tbody>

        <?php

        if (isset($_POST["list"])) {

            for ($x = 0; $x < $resultCount; $x++) {

                $races = $response->MRData->RaceTable->Races[0];
                $results = $races->Results[$x];
                $driver = $results->Driver;

                if (!empty($results->FastestLap)) {

                    $fastestLap = $results->FastestLap;
                    $lap = $fastestLap->lap;
                    $time = $fastestLap->Time->time;
                    $speed = $fastestLap->AverageSpeed->speed;
                }

        ?>
                <tr>
                    <td><?= $results->position ?: ""; ?></td>
                    <td><?= $races->raceName; ?></td>
                    <td><?= $races->Circuit->circuitName; ?></td>
                    <td><?= $driver->givenName . " " . $driver->familyName; ?></td>
                    <td><?= $results->Constructor->name; ?></td>
                    <td><?= $races->date; ?></td>
                    <td><?= $results->grid; ?></td>
                    <td><?= $results->laps; ?></td>
                    <td><?= $results->status; ?></td>
                    <td><?= $lap ?: ""; ?></td>
                    <td><?= $time ?: ""; ?></td>
                    <td><?= $speed ?: ""; ?></td>
                </tr>
        <?php
            }
        }
        ?>

</table>