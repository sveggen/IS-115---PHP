<!-- Oppgave 1 -->
<html>
<head>
    <title>Etternavn</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/modul-5/style.css">
</head>
<body>
<h1>Etternavn</h1>
        <hr width=100%”>

        <form method="get" action="">
            <input name="etternavn" type="text" placeholder="Etternavn" class="form-control" style="width:20%">
	        <input name="submit" type="submit" value="Send" class="w3-circle w3-green">
	    </form>
        </div>

<?php
$etternavn = $_GET['etternavn'];
$submit = $_GET['submit'];

/**
 * Konverter streng uavhengig format til små bokstaver.
 */
function strotolower_world($str){
    return mb_convert_case($str, MB_CASE_LOWER);
}

/**
 * Konverter første bokstav i hvert ord i
 * streng uavhengig format til stor bokstav.
 */
function ucfirst_world($str){
    return mb_convert_case($str, MB_CASE_TITLE);
}

/**
 * Teller antall bokstaver i streng uavhengig format
 * og teller ikke med mellomrom og bindestrek.
 */
function strlength_world($str){
    return mb_strlen(str_replace(array(" ", "-"), "", $str));
}

if (!empty($etternavn)) {
    $converted_str = ucfirst_world(strotolower_world($etternavn));
    echo "Etternavn:" . $converted_str . "<br> Antall bokstaver: " . strlength_world($etternavn);

} elseif (isset($submit) && empty($etternavn)) {
    echo "Ingen etternavn fylt inn";
}
?>

</body>
</html>