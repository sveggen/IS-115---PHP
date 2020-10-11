<!-- Oppgave 1 -->
<html>
<head>
    <title>Etternavn</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/modul-5/style.css">
</head>
<body>
<h1>Etternavn</h1>
        <hr width=100%”>

        <form method="get" action="">
            <input name="etternavn" type="text" placeholder="Etternavn" class="form-control" style="width:20%">
	        <input name="submit" type="submit" value="Send" class="w3-circle w3-green">
	    </form>
        </div>

<?php
$etternavn = $_GET['etternavn'];
$submit = $_GET['submit'];

if (!empty($etternavn)) {
    $etternavn = ucfirst(strtolower($etternavn));
    $lengde = strlen($etternavn);
    echo "Etternavn lagret: {$etternavn} med {$lengde} bokstaver";
} elseif (isset($submit) && empty($etternavn)) {
    echo "ingen navn oppført";
}

?>

</body>
</html>