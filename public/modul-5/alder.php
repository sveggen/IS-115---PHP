<!-- Oppgave 4 -->
<html>
<head>
    <title>Alder</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/modul-5/style.css">
</head>
<body>
<h1>Hvor gammel er du?</h1>
        <hr width=100%”>

        <form method="get" action="">
            <input name="dag" type="number" min="1" max="31" placeholder="Dag" class="form-control" style="width:20%">
            <input name="måned" type="number" min="1" max="12" placeholder="Måned" class="form-control" style="width:20%">
            <input name="år" type="number" min="1970" max="2020" placeholder="År" class="form-control" style="width:20%">
	        <input name="submit" type="submit" value="Send" class="w3-circle w3-green">
	    </form>
        </div> 

<?php
$alder = $_GET['alder'];
$submit = $_GET['submit'];

echo $alder;

?>


</body>
</html>
