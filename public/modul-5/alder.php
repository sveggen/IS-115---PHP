<!-- Oppgave 4 -->
<?php
include './include/header.inc.php';
$title = "Alder";
?>
<h1>Hvor gammel er du?</h1>
<hr width=100%”>

<form method="get" action="">
    <input name="day" type="number" min="1" max="31" placeholder="Dag" class="form-control" style="width:20%">
    <input name="month" type="number" min="1" max="12" placeholder="Måned" class="form-control" style="width:20%">
    <input name="year" type="number" min="1900" max="2020" placeholder="År" class="form-control" style="width:20%">
    <input name="submit" type="submit" value="Send" class="w3-circle w3-green">
</form>
</div>

<?php
$submit = $_GET['submit'];
$day = $_GET['day'];
$month = $_GET['month'];
$year = $_GET['year'];

// sjekker om alle felt er utfylt og dato eksisterer.
if (isset($submit) && !empty($day) && !empty($month) && !empty($year)) {
    if (checkdate($month, $day, $year) == true) {

        /**
         * @return DateTime med tidspunkt fra når bruker ble født.
         */
        function getBirthdate($year, $month, $day)
        {
            $agestr = $year . "-" . $month . "-" . $day;
            return $birthdate = new DateTime($agestr);
        }

        /**
         * @return string som inneholder alder til bruker i år og dager.
         */
        function getAgeInYearsAndDays($year, $month, $day)
        {
            $birthdate = getBirthdate($year, $month, $day);
            $now = new DateTime();
            $difference = $now->diff($birthdate);
            $age_in_years = $difference->y;
            $age_in_days = $difference->days;
            $age_in_days = $age_in_days % 365;
            return $age_in_years . " år, og " . $age_in_days . " dager gammel.";
        }

        echo "<p><u>Du er " . getAgeInYearsAndDays($_GET['year'], $_GET['month'], $_GET['day']) . " <u></p>";
    } else {
        echo "<p>Ugyldig dato.</p>";
    }
} else {
    echo "<p>Alle felt er ikke fylt ut.</p>";
}

include './include/footer.inc.php'; ?>