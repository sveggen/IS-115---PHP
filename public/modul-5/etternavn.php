<!-- Oppgave 1 -->
<?php
include './include/header.inc.php';
$title = "Etternavn";
?>
    <h1>Etternavn</h1>
    <hr width=100%”>

    <form method="get" action="">
        <input name="etternavn" type="text" placeholder="Etternavn" class="form-control" style="width:20%">
        <input name="submit" type="submit" value="Send" class="w3-circle w3-green">
    </form>
    </div>

    <?php
    $etternavn = $_GET['etternavn'];

    /**
     * Konverter streng uavhengig format til små bokstaver.
     */
    function strotolower_world($str)
    {
        return mb_convert_case($str, MB_CASE_LOWER);
    }

    /**
     * Konverter første bokstav i hvert ord i
     * streng uavhengig format til stor bokstav.
     */
    function ucfirst_world($str)
    {
        return mb_convert_case($str, MB_CASE_TITLE);
    }

    /**
     * Teller antall bokstaver i streng uavhengig format
     * og teller ikke med mellomrom og bindestrek.
     */
    function strlength_world($str)
    {
        return mb_strlen(str_replace(array(" ", "-"), "", $str));
    }

    if (!empty($etternavn)) {
        $converted_str = ucfirst_world(strotolower_world($etternavn));
        echo "Etternavn: " . $converted_str . "<br> Antall bokstaver: " . strlength_world($etternavn);
    } elseif (isset($submit) && empty($etternavn)) {
        echo "Ingen etternavn fylt inn";
    }

    include './include/footer.inc.php'; ?>