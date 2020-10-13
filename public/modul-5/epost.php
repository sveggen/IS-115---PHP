<!-- Oppgave 5 -->

<?php 
    $avsender = "test@gmail.com";
    $til = "m.sveggen@gmail.com";
    $emne = "Oppgave 5";
    $innhold = "Dette er innholdet i eposten";
    mail($til, $emne, $innhold);

    echo "Epost ble sendt";
?>
