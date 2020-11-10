<!-- Oppgave 3 -->
<?php
include './include/header.inc.php';
$title = "Regnemaskin";
?>

<h1>Regnemaskin</h1>
<hr width=100%”>

<form method="post" action="">
    <input name="første" type="number" placeholder="Tall 1" class="form-control" style="width:10%">
    <input name="andre" type="number" placeholder="Tall 2" class="form-control" style="width:10%">
    <input name="submit" type="submit" value="Kalkuler" class="w3-circle w3-green">
</form>
</div>
<?php

$forsteTall = $_POST['første'];
$andre = $_POST['andre'];
if (isset($_POST['submit']) && is_numeric($_POST['første']) && is_numeric($_POST['andre'])) {

    /**
     * Adderer, substraherer og regner ut gjennomsnittet av to gitte tall.
     * Utfører disse operasjonene 10 ganger, og det blir lagt til '1' på det
     * første tallet for hver iterasjon.
     */
    $i = 1;
    for ($forste = $forsteTall; $i < 11; $forste++) {
        echo "<h1>Iterasjon $i</h1>";
        $sum = $forste + $andre;
        echo "<p>$forste pluss {$_POST['andre']} er lik " . $sum . "</p>";

        $differanse = $forste - $andre;
        echo "<p>$forste minus {$_POST['andre']} er lik " . $differanse . "</p>";

        $gjenomsnitt = ($forste + $andre) / 2;
        echo "<p> Gjenomsnittet av av $forste og {$_POST['andre']} er " . $gjenomsnitt . "</p><br>";
        $i++;
    }
}

include './include/footer.inc.php'; ?>