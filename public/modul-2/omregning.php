<!-- Oppgave 3 -->
<html>
    <head>
        <title>Omregning</title>
        <link rel="stylesheet" href="/modul-2/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
<h1>Omregning</h1>
<hr width=100%”>
<?php
$start = 4400;

$val1 = $start / 60;
$sekunder = $start % 60;
$timer = floor($val1 / 60);
$minutter = $val1 % 60;

echo " $start  omregnet til timer, minutter og sekunder blir:<u></br>  $timer  time(r) $minutter  minutter  $sekunder sekunder </u>";
?>
    </body>
</html>