<!-- Oppgave 4 -->
<?php 

$medlem1 = 123123;
$medlem2 = 123123;
?>
<html>
    <head>
        <title>Medlemsnummer</title>
        <link rel="stylesheet" href="/modul-2/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <h1>Sammenligning av medlemsnummere</h1>
        <hr width=100%”>

        <?php
        ob_start();
        $status = var_dump($medlem1 == $medlem2);
        $result = ob_get_clean();
        echo $result;


        echo "Medlemsnummer 1: $medlem1</br>";
        echo "Medlemsnummer 2: $medlem2</br></br>";


        $search = "true";
        if (preg_match("/{$search}/i", $result)) {
            echo "<p style='color:green'>Medlemsnummerene stemmer overens</p>";
        } else {
            echo "<p style='color:red'>Medlemsnummerene stemmer ikke overens</p>";
        }

        ?>
    </body>
</html>