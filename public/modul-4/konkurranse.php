<!-- Oppgave 3 -->
<?php
include './include/header.inc.php';
$title = "Nytt medlem";
?>

<h1>Konkurranse</h1>
<hr width=100%”>

<form method="post" action="">
    <input name="submit" type="submit" value="Start konkurranse" class="btn btn-dark">
</form>

<?php

$game = false;

// starter spill når man trykker på "Start konkurranse".
if (isset($_POST['submit'])) {
    konkurranse();
}

/**
 * Konkurranse som trekker et tilfeldig tall for
 * hver deltaker og den med minst poeng ryker ut hver runde.
 * Vinneren er den som står igjen med flest poeng.
 */
function konkurranse()
{
    global $game;
    $game = true;

    $deltakere = array("Frank" => 0, "Hans" => 0, "Oliver" => 0, "Hobbe" => 0,
        "Franker" => 0, "Mona" => 0, "Harald" => 0, "Randi" => 0, "Lisa" => 0, "Guri" => 0 );

    // Printer ut alle deltakerene
    echo 'Deltakere: ' . implode(", ", array_keys($deltakere)) . '<hr width=100%”>';
    $runde = 0;
    while (count($deltakere) >= 2 && $game == true) {
        echo "<h2>Runde: " . ++$runde . "\n</h2>";

        // Trekker tall
        foreach ($deltakere as $key => $value) {
            $deltakere[$key] = random_int(1, 50);
            echo "<p> $key fikk poengsummen $deltakere[$key] \n</p>";
        }

        // Returnerer deltaker(e) med lavest poengsum
        $laveste = array_keys($deltakere, min($deltakere));

        // Annonserer flere vinnere
        if (count(array_unique($deltakere)) == 1) {
            echo '<h3><div class="p-3 mb-2 bg-success text-white">Deltaker ' . implode(" og ", array_keys($deltakere)) . ' vant</h3></div>';
            break;
        }
        // Fjerner deltaker(e)
        foreach ($laveste as $item) {
            unset($deltakere[$item]);
            echo '<p class="text-danger">Deltaker ' . $item . ' hadde minst poeng og røk ut</p>';
        }

        // Annonserer vinner
        if (count(array_unique($deltakere)) == 1) {
            if (count($deltakere) == 1) {
                echo '<h3><div class="p-3 mb-2 bg-success text-white">Deltaker ' . implode(" og ", array_keys($deltakere)) . ' vant</div></h3></u>';
                break;
            }
        }
    }

}

include './include/footer.inc.php'; ?>