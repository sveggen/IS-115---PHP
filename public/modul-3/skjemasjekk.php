<!-- Oppgave 4 -->
<html>
<head>
    <title>Skjemasjekk</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/modul-3/style.css">
</head>
<body>
<h1>Skjemasjekk</h1>
        <hr width=100%”>

<form method="post" action="">
            <input name="navn" type="text" placeholder="Navn" class="form-control" style="width:20%">
            <input name="adresse" type="text" placeholder="Adresse" class="form-control" style="width:20%">
            <input name="telefonnummer" type="text" placeholder="Telefonnummer" class="form-control" style="width:20%">
	        <input name="submit" type="submit" value="Send" class="w3-circle w3-green">
	    </form>
        </div>
<?php
$array = array();
if (empty($_POST['navn'])) {
    array_push($array, $verdi = "Navn");
}
if (empty($_POST['adresse'])) {
    array_push($array, $verdi = "Adresse");
}
if (empty($_POST['telefonnummer'])) {
    array_push($array, $verdi = "Telefonnummer");
} 
elseif (!empty($_POST['adresse']) && !empty($_POST['navn']) && !empty($_POST['telefonnummer'])) {
    echo "Alt ok!";
}

if(isset($_POST['submit']) && !empty($array)){
    echo "Følgende felt mangler verdi: " .  implode(", ", $array);
}
?>
</body>
</html>