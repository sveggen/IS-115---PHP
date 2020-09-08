<!-- Oppgave 2 -->
<html>
    <head>
        <title>Teller</title>
        <link rel="stylesheet" href="/modul-3/style.css">
    </head>
<body>
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