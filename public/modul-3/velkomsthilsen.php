<!-- Oppgave 5 -->
<html>
<head>
    <title>Velkomsthilsen</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/modul-3/style.css">
</head>
<body>
<h1>Velkomsthilsen</h1>
<?php
date_default_timezone_set('CET');
$fornavn = "Silje";
$tid = date("G");
$tidogminutter = date("G:i");

switch (true) {
    case ($tid >= 6 && $tid <= 9):
        $dagtid = "morgen";
    break;
    case ($tid > 9 && $tid <= 12):
        $dagtid = "formiddag";
    break;
    case ($tid > 12 && $tid <= 17):
        $dagtid = "ettermiddag";
    break;
    case ($tid >= 18 && $tid <= 23):
        $dagtid = "kveld";
    break;
    case ($tid >= 0 && $tid <= 5):
        $dagtid = "natt";
    break;
}
echo "<p>God " . $dagtid . " " . $fornavn . ". Klokken er " . $tidogminutter . ".</p>";
?>
</body>
</html>