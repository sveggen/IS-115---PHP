<!-- Oppgave 5 -->
<?php
include './include/header.inc.php';
$title = "Velkomsthilsen";
?>

<h1>Velkomsthilsen</h1>

<?php
// angir tidssone og format på klokke.
date_default_timezone_set('CET');
$fornavn = "Silje";
$tid = date("G");
$tidogminutter = date("G:i");


/**
 * Printer ut en velkomsthilsen basert på hva klokken.
 * F.eks. "God kveld" når klokken er 19:45.
 */
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

include './include/footer.inc.php'; ?>