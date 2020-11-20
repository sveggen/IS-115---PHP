<!-- Oppgave 4 -->
<?php
include './include/header.inc.php';
$title = "Skjemasjekk";
?>
<h1>Skjemasjekk</h1>
<hr width=100%”>

<form method="get" action="">
    <input name="navn" type="text" placeholder="Navn" class="form-control" style="width:20%">
    <input name="adresse" type="text" placeholder="Adresse" class="form-control" style="width:20%">
    <input name="telefonnummer" type="tel" pattern="[0-9]{8}" placeholder="Telefonnummer" class="form-control"
           style="width:20%">
    <input name="submit" type="submit" value="Send" class="w3-circle w3-green">
</form>

<?php

$array = array();

/**
 * Sjekker om noen av 'input'-feltene mangler verdi,
 * og legger disse i en array.
 */
if (empty($_GET['navn'])) {
    array_push($array, $verdi = "Navn");
}
if (empty($_GET['adresse'])) {
    array_push($array, $verdi = "Adresse");
}
if (empty($_GET['telefonnummer'])) {
    array_push($array, $verdi = "Telefonnummer");
} elseif (!empty($_GET['adresse']) && !empty($_GET['navn']) && !empty($_GET['telefonnummer'])) {
    echo "Alt ok!";
}

// Printer feltene som ikke har verdi.
if (isset($_GET['submit']) && !empty($array)) {
    echo "Følgende felt mangler verdi: " . implode(", ", $array);
}

include './include/footer.inc.php';