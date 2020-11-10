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
            <input name="telefonnummer" type="tel" pattern="[0-9]{8}" placeholder="Telefonnummer" class="form-control" style="width:20%">
	        <input name="submit" type="submit" value="Send" class="w3-circle w3-green">
	    </form>
        </div>
<?php
$array = array();
if (empty($_GET['navn'])) {
    array_push($array, $verdi = "Navn");
}
if (empty($_GET['adresse'])) {
    array_push($array, $verdi = "Adresse");
}
if (empty($_GET['telefonnummer'])) {
    array_push($array, $verdi = "Telefonnummer");
} 
elseif (!empty($_GET['adresse']) && !empty($_GET['navn']) && !empty($_GET['telefonnummer'])) {
    echo "Alt ok!";
}

if(isset($_GET['submit']) && !empty($array)){
    echo "Følgende felt mangler verdi: " .  implode(", ", $array);
}
?>
</body>
</html>