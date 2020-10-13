<!-- Oppgave 2 -->

<html>
<head>
    <title>Passordgenerator</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/modul-5/style.css">
</head>
<body>
<h1>Passordgenerator</h1>
        <hr width=100%”>

<form method="get" action="">
            <input name="etternavn" type="text" placeholder="Etternavn" class="form-control" style="width:20%">
            <input name="submit" type="submit" value="Send" class="w3-circle w3-green">
	    </form>
        </div>
<?php

if (!empty($_GET['etternavn']) && isset($_GET['submit'])){

    $etternavn = $_GET['etternavn'];
    $hash = md5($etternavn);

    $passordlengde = 8;
    $hashlengde = strlen($hash);

    # Startposisjon i hashet verdi
    $start = rand(0, ($hashlengde - $passordlengde - 1));

    # Echo'er 8 tegn av av hashet verdi. 
    echo "Etternavn: " . $etternavn . "<br>";
    echo "Foreslått passord: " . $passord = substr($hash, $start, $passordlengde);
} else {
    echo "Ingen etternavn fylt inn";
}

?>

</body>
</html>


