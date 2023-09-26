<?php include 'partials/header.php'; ?>

<table class="table">
    <form method="POST" style="float: left;">
        <input type="number" name="year" id="year" class="m-2" style="border-radius: 3px; width: 150px;"
               placeholder="Year (2012-2023)" min="2012" max="2023" required>
        <input type="number" name="round" id="round" class="m-2" style="border-radius: 3px; width: 150px;"
               placeholder="Round" min="1" required>
        <button type="submit" class="btn btn-primary" class="m-1" name="list" id="list">List</button>
    </form>
    <thead>
    <h1 style="text-align: center;">Top 5 Guess</h1>
    <tr>
        <th>Year:</th>
        <td style="color: blue;"><b><?= $yearInput ?></b></td>
        <th>Round:</th>
        <td style="color: blue;"><b><?= $roundInput ?></b></td>
    </tr>
    <tr>
        <th scope="col">Position</th>
        <th scope="col">Driver</th>
    </tr>
    </thead>
    <tbody>

    <?php

    if (isset($_POST["list"])) {

        if (isset($response->MRData->StandingsTable->StandingsLists[0])) {

            for ($x = 0; $x < 5; $x++) {

                $standingLists = $response->MRData->StandingsTable->StandingsLists[0];

                if (!empty($standingLists->DriverStandings) || !empty($pitStop->duration)) {
                    $driverStandings = $standingLists->DriverStandings[$x];

                    $position = $driverStandings->position;
                    $givenName = $driverStandings->Driver->givenName;
                    $familyName = $driverStandings->Driver->familyName;
                }


                ?>
                <tr>
                    <td><?= $position ?: ""; ?></td>
                    <td><?= $givenName . " " . $familyName ?: ""; ?></td>
                </tr>
                <?php
            }
        }
    }
    ?>
    </tbody>
</table>
</body>

<?php include 'partials/footer.php'; ?>
