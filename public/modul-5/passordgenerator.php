<!-- Oppgave 2 -->

<?php
include './include/header.inc.php';
$title = "Passordgenerator";
?>
    <h1>Passordgenerator</h1>
    <hr width=100%”>

    <form method="get" action="">
        <input name="etternavn" type="text" placeholder="Etternavn" class="form-control" style="width:20%">
        <input name="submit" type="submit" value="Send" class="w3-circle w3-green">
    </form>
    </div>
    <?php

    /**
     * @param $etternavn
     * @return false|string
     */
    function generatePassword($etternavn)
    {
        $hash = md5($etternavn);
        $passordlengde = 8;
        $hashlengde = strlen($hash);
        # Startposisjon i hashet verdi
        $start = rand(0, ($hashlengde - $passordlengde - 1));
        return substr($hash, $start, $passordlengde);
    }

    if (!empty($_GET['etternavn']) && isset($_GET['submit'])) {

        $etternavn = $_GET['etternavn'];
        $temppass = generatePassword($etternavn);

        if (preg_match('/[0-9]/', $temppass) && preg_match('/[A-Z]/', $temppass)) {
            # Echo'er 8 tegn av av hashet verdi. 
            echo $temppass;
        } else {
            $a_z = "ABCDEFGHIJKLMNO";
            $temppass[random_int(0, 8)] = $a_z[random_int(0, 14)];
            $temppass[random_int(0, 8)] = random_int(0, 9);
            echo $temppass;
        }
    } else {
        echo "Ingen etternavn fylt inn";
    }

    include './include/footer.inc.php'; ?>