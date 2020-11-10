<!-- Oppgave 2 -->
<?php
include './include/header.inc.php';
$title = "Teller";
?>
    <h1>Teller</h1>
<?php
for($tall=0; $tall < 10; $tall++){ 
    echo '<p>' .$tall . '</p>';
    $sum += $tall;
}
echo "<br> Juhuu, ferdig å telle! Summen av tallene ble $sum";
?>
</body>
</html>