<!-- Oppgave 2 -->
<?php
include './include/header.inc.php';
$title = "Overskrive matris";
?>
    <h1>Overskrive matrise</h1>
    <hr width=100%”>
<?php
// start-array
$array = array("for", "en", "fin", "dag", "det", "var", "det", "var", "i", "dag");
echo "<h3>Start-array</h3>";
print_r($array);

//endrer alle verdier i array
for ($i=0; $i<10; $i++){
    if (($i % 2) == 0) {
    $array[$i] = "ja";
    } else {
        $array[$i] = "nei";
    };
};
echo "<h3>Endret verdi i array</h3>";
print_r($array);

//inkrementerer indeksen til alle verdier i array med 10
$index = 10;
$nytt_array = array_combine(range($index, count($array)+ $index-1), array_values($array));
echo "<h3>Array med index inkrementert med 10</h3>";
print_r($nytt_array);
?>
    </body>
</html>