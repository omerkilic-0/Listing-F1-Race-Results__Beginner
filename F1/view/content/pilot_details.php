<?php include 'partials/header.php'; ?>

    <table class="table">
        <form method="POST" style="float: left;">
            <input type="number" name="year" id="year" class="m-2" style="border-radius: 3px; width: 150px;"
                   placeholder="Year (2003-2023)" min="2003" max="2023" required>
            <input type="text" name="pilotInput" id="pilotInput" class="m-2" style="border-radius: 3px; width: 150px;"
                   placeholder="Pilot" min="1" required>
            <button type="submit" class="btn btn-primary" class="m-1" name="list" id="list">List</button>
        </form>
        <thead>
        <h1 style="text-align: center;">Pilot Season Details</h1>
        <tr>
            <th>Year:</th>
            <td style="color: blue;"><b><?= $yearInput ?></b></td>
            <th>Pilot:</th>
            <td style="color: blue;"><b><?= $pilotInput ?></b></td>
        </tr>
        <tr>
            <th scope="col">Round</th>
            <th scope="col">Pilot Name</th>
            <th scope="col">Race Name</th>
            <th scope="col">Circuit Name</th>
            <th scope="col">Constructor</th>
            <th scope="col">Grid</th>
            <th scope="col">Position</th>
            <th scope="col">Status</th>
            <th scope="col">Laps</th>
            <th scope="col">Average Speed</th>
            <th scope="col">Points</th>
        </thead>
        <tbody>

        <?php

        if (isset($_POST["list"])) {

            $total = count($response->MRData->RaceTable->Races);

            for ($x = 0; $x < $total; $x++) {

                $races = $response->MRData->RaceTable->Races[$x];
                $round = $races->round;
                $results = $races->Results[0];
                $givenName = $results->Driver->givenName;
                $familyName = $results->Driver->familyName;
                $raceName = $races->raceName;
                $country = $races->Circuit->Location->country;
                $position = $results->position;
                $points = $results->points;
                $name = $results->Constructor->name;
                $grid = $results->grid;
                $laps = $results->laps;
                $status = $results->status;
                if (isset($results->FastestLap)) {
                    $speed = $results->FastestLap->AverageSpeed->speed;
                }
                $topPoints += $points;
                ?>
                <tr>
                    <td><?= $round ?: ""; ?></td>
                    <td><?= $givenName . " " . $familyName ?: ""; ?></td>
                    <td><?= $raceName ?: ""; ?></td>
                    <td><?= $country ?: ""; ?></td>
                    <td><?= $name ?: ""; ?></td>
                    <td><?= $grid ?: ""; ?></td>
                    <td><?= $position ?: ""; ?></td>
                    <td><?= $status ?: ""; ?></td>
                    <td><?= $laps ?: ""; ?></td>
                    <td><?= $speed ?: ""; ?></td>
                    <td><?= $points ?: ""; ?></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
    <br>
    <center>
        <table>
            <tr>
                <th style="background-color: white; font-size:x-large">Top Points:</th>
                <td style="color: blue; font-size:x-large"><b><?= $topPoints ?: ""; ?></b></td>
            </tr>
        </table>
    </center>
    <br>
    </body>

<?php include 'partials/footer.php'; ?>