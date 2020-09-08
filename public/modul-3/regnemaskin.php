<!-- Oppgave 3 -->
<html>
    <head>
        <title>Regnemaskin</title>
        <link rel="stylesheet" href="/modul-2/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
    <body>
        <h1>Regnemaskin</h1>
        <hr width=100%”>

<form method="post" action="">
            <input name="første" type="text" placeholder="Tall 1" class="form-control" style="width:10%">
	        <input name="andre" type="text" placeholder="Tall 2" class="form-control" style="width:10%">
	        <input name="submit" type="submit" value="Kalkuler" class="w3-circle w3-green">
	    </form>
        </div>
<?php
$førstetall = $_POST['første'];
$andre = $_POST['andre'];
if (isset($_POST['submit']) && is_numeric($_POST['første']) && is_numeric($_POST['andre'])){
    $i = 1;
    for($første = $førstetall; $i < 11; $første++){
    echo "<h1>Iterasjon $i</h1>";
    $sum = $første + $andre;
    echo "<p>$første pluss {$_POST['andre']} er lik " . $sum . "</p>";

    $differanse = $første - $andre;
    echo "<p>$første minus {$_POST['andre']} er lik " . $differanse . "</p>";
    
    $gjenomsnitt = ($første + $andre) / 2;
    echo "<p> Gjenomsnittet av av $første og {$_POST['andre']} er " . $gjenomsnitt . "</p><br>";
    $i++;
    }
}
?>
</body>
</html>