<!-- Oppgave 3 -->

<html>

<head>
    <title>Fjern kode</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/modul-5/style.css">
</head>

<body>
    <h1>Fjern kode</h1>
    <hr width=100%”>

    <form method="get" action="">
        <input name="etternavn" type="text" class="form-control" placeholder="Etternavn" style="width:20%">
        <input name="submit" type="submit" value="Send" class="w3-circle w3-green">
    </form>
    </div>

    <?php
    $alder = $_GET['etternavn'];
    $submit = $_GET['submit'];

    $fjernet_kode = htmlentities($alder);

    echo "<br>";
    echo $fjernet_kode;

    ?>


</body>

</html>