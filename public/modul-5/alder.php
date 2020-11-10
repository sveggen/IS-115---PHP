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

    if (isset($submit) && !empty($day) && !empty($month) && !empty($year)) {
        if (checkdate($month, $day, $year) == true) {

            $agestr = $year . "-" . $month . "-" . $day;
            $now = new DateTime();
            $birthdate = new DateTime($agestr);
            # Finner differansen mellom de to datointervallene. 
            $difference = $now->diff($birthdate);
            $age_in_years = $difference->y;
            $age_in_days = $difference->days;
            $age_in_days = $age_in_days % 365;

            echo "<p>Fødselsdato: " . date('d.m.Y', strtotime($agestr)) . "</p>";
            echo "<p><u>Du er " . $age_in_years . "år, og " . $age_in_days . " dager gammel.<u></p>";
        } else {
            echo "<p>Ugyldig dato.</p>";
        }
    } else {
        echo "<p>Alle felt er ikke fylt ut.</p>";
    }

    include './include/footer.inc.php'; ?>