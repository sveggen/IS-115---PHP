<!-- Oppgave 5 -->
<?php
include './include/header.inc.php';
$title = "Epost";
?>
    <h1>Epost</h1>
    <hr width=100%”>

    <form method="get" action="">
        <input name="emne" type="text" placeholder="Emne" class="form-control" style="width:20%">
        <input name="innhold" type="textarea" placeholder="Innhold" class="form-control" rows="4" style="width:20%">

        <input name="submit" type="submit" value="Send" class="w3-circle w3-green">
    </form>
    </div>

    <?php
    if (isset($_GET['submit']) && !empty($_GET['emne']) && !empty($_GET['innhold'])) {

        $avsender = "test@gmail.com";
        $til = "m.sveggen@gmail.com";
        $emne = $_GET['emne'];
        $innhold = $_GET['innhold'];
        $headers = "From: test@gmail.com";
        mail($til, $emne, $innhold, $headers);

        echo "Epost ble sendt";
    } else {
        echo "Fyll ut alle feltene";
    }

    include './include/footer.inc.php'; ?>