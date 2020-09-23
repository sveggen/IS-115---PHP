<!-- Oppgave 1 -->
<html>
<head>
    <title>Myndighetskalkulator</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/modul-3/style.css">
    <body>
        <h1>Myndighetskalkulator</h1>
        <hr width=100%”>

<form method="post" action="">
            <input name="alder" type="number" min="0" placeholder="Alder" class="form-control" style="width:10%">
	        <input name="navn" type="text" placeholder="Navn" class="form-control" style="width:10%">
	        <input name="submit" type="submit" value="Send" class="w3-circle w3-green">
	    </form>
        </div>

<?php
$alder = $_POST['alder'];
$navn = $_POST['navn'];
if (isset($_POST['submit']) && isset($_POST['alder']) && isset($_POST['navn']) &&is_numeric($_POST['alder'])){
$myndig = ($alder >= 18) ? "myndig" : "ikke myndig";

$aldertype = "";
switch (true) {
    case ($alder <= 11):
        $aldertype = "et barn";
    break;
    case ($alder>=12 && $alder<20):
        $aldertype = "tenåring";
    break;
    case ($alder>=20 && $alder<130):
        $aldertype = "voksen";
    break;
    case ($alder>=130):
        $aldertype = "mest sannsynlig død";
}
echo $navn . " er " . $aldertype . " og er " . $myndig . ".";
}
?>
</body>
</html> 