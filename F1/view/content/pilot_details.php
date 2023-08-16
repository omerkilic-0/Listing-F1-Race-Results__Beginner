<table class="table">
    <form method="POST" style="float: left;">
        <input type="number" name="year" id="year" class="m-2" style="border-radius: 3px; width: 150px;" placeholder="Year (2012-2023)" min="2012" max="2023" required>
        <input type="text" name="pilotInput" id="pilotInput" class="m-2" style="border-radius: 3px; width: 150px;" placeholder="Pilot" min="1" required>
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
            <th scope="col">Country</th>
            <th scope="col">constructor</th>
            <th scope="col">Q1</th>
            <th scope="col">Q2</th>
            <th scope="col">Q3</th>
            <th scope="col">Grid</th>
            <th scope="col">Position</th>
            <th scope="col">Points</th>
            <th scope="col">Status</th>
    </thead>
    <tbody>

        <?php

        if (isset($_POST["list"])) {

            $total = count($response->MRData->RaceTable->Races);

            for ($x = 0; $x < $total; $x++) {
                $races = $response->MRData->RaceTable->Races[$x];

                if (isset($races->QualifyingResults[0]->Q3)) {
                    $round = $races->round;
                    $qualifyResults =  $races->QualifyingResults[0];
                    $driver =$qualifyResults->Driver;
                    $givenName = $driver->givenName;
                    $familyName = $driver->familyName;
                    $raceName = $races->raceName;
                    $circuitName = $races->Circuit->circuitName;
                    $country = $races->Circuit->Location->country;
                    $constructorId = $qualifyResults->Constructor->name;
                    $position =$qualifyResults->position;
                    $q1 =$qualifyResults->Q1;
                    $q2 =$qualifyResults->Q2;
                    $q3 =$qualifyResults->Q3;
                    $point = $response_2->MRData->RaceTable->Races[$x]->Results[0]->points;
                    $status = $response_2->MRData->RaceTable->Races[$x]->Results[0]->status;
                    $grid = $response_2->MRData->RaceTable->Races[$x]->Results[0]->grid;

                    $topPoints += $point;

        ?>
                    <tr>
                        <td><?= $round ?: ""; ?></td>
                        <td><?= $givenName . " " . $familyName ?: ""; ?></td>
                        <td><?= $raceName ?: ""; ?></td>
                        <td><?= $circuitName ?: ""; ?></td>
                        <td><?= $country ?: ""; ?></td>
                        <td><?= $constructorId ?: ""; ?></td>
                        <td><?= $q1 ?: ""; ?></td>
                        <td><?= $q2 ?: ""; ?></td>
                        <td><?= $q3 ?: ""; ?></td>
                        <td><?= $grid ?: ""; ?></td>
                        <td><?= $position ?: ""; ?></td>
                        <td><?= $point ?: ""; ?></td>
                        <td><?= $status ?: ""; ?></td>
                    </tr>
        <?php
                }
            }
        }
        if($topPoints == 0) {
            $topPoints = "";
        }
        ?>
    </tbody>
</table>
<br>
<center>
    <table>
        <tr>
            <th style="background-color: white; font-size:x-large">Top Points: </th>
            <td style="color: blue; font-size:x-large"><b><?= $topPoints ?></b></td>
        </tr>
    </table>
</center>
<br>
</body>