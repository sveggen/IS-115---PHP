<!-- Oppgave 2 -->
<?php
include './include/header.inc.php';
$title = "Teller";
?>

<h1>Teller</h1>

<?php

/**
 * Looper over tallene i rangen 0-9 og printer disse.
 * Summerer alle tallene i rangen og printer summen.
 */
for ($tall = 0; $tall < 10; $tall++) {
    echo '<p>' . $tall . '</p>';
    $sum += $tall;
}
echo "<br> Juhuu, ferdig å telle! Summen av tallene ble $sum";

include './include/footer.inc.php'; ?>