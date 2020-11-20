<!-- Oppgave 3 -->

<?php
include './include/header.inc.php';
$title = "Fjern kode";
?>
<h1>Fjern kode</h1>
<hr width=100%”>

<form method="get" action="">
    <input name="etternavn" type="text" class="form-control" placeholder="Etternavn" style="width:20%">
    <input name="submit" type="submit" value="Send" class="w3-circle w3-green">
</form>
</div>

<?php
$alder = $_GET['etternavn'];
$submit = $_GET['submit'];

// Konverter verdi innfylt av bruker til HTML-tegn.
$fjernet_kode = htmlentities($alder);

echo "<br>";
echo $fjernet_kode;

include './include/footer.inc.php'; ?>