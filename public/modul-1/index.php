 <!-- Oppgave 2 -->
<html>
    <head>
    <link rel="stylesheet" href="/modul-1/style.css">
</head>
    <body>
        <h2>Velkommen til Norge.no</h2>
        <?php
        echo "<p>Hva er hovedstaden i Norge? ";
        echo "<strong>Oslo</strong>";
        echo "<br/>";
        ?>
        I dag er det den <b><?php echo date("d.m.Y");?></b>
        </p>
        <?php
        //Mine endringer
    $syttendemai = strtotime('17.05.2021');
    $idag = strtotime(date("d.m.Y"));
    $tidigjen = $syttendemai - $idag;
    $dagerigjen = abs(round($tidigjen / 86400)); //86400 = antall sek. i en dag
    echo "I dag er det <b>$dagerigjen dager</b> igjen til Norges nasjonaldag 17. mai</p>";
    ?>  
    </body>
</html>     