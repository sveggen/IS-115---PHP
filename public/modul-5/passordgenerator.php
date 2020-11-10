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
     * @return string generer passord på 8 tegn basert på input.
     */
    function generatePassword($etternavn)
    {
        $hash = md5($etternavn);
        $passordLengde = 8;
        $hashLengde = strlen($hash);
        # Startposisjon i hashet verdi
        $start = rand(0, ($hashLengde - $passordLengde - 1));
        return substr($hash, $start, $passordLengde);
    }

    if (!empty($_GET['etternavn']) && isset($_GET['submit'])) {

        $etternavn = $_GET['etternavn'];
        $temppass = generatePassword($etternavn);

        // sjekker om generert passord inneholder et tall og en stor bokstav.
        if (preg_match('/[0-9]/', $temppass) && preg_match('/[A-Z]/', $temppass)) {
            # Echo'er 8 tegn av av hashet verdi. 
            echo $temppass;
        } else {
            // legger til en stor bokstav og et tall.
            $a_z = "ABCDEFGHIJKLMNO";
            $temppass[random_int(0, 8)] = $a_z[random_int(0, 14)];
            $temppass[random_int(0, 8)] = random_int(0, 9);
            echo $temppass;
        }
    } else {
        echo "Ingen etternavn fylt inn";
    }

    include './include/footer.inc.php'; ?>